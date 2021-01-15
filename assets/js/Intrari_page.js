
var datepicker_global = undefined;
var getUrl = window.location;
var base_url = getUrl .protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1] + '/';
function getintrari() {
    $.ajax({
        url: "Intrari/getIntrari",
        method: "POST",
        success: function (response) {

            // parse data to json object
            var obj = JSON.parse(response);

            if (obj.length > 0) {

                // clean the table content
                $('#intrari_table_body').empty();

                // list object
                $.each(obj, function (index, value) {
                    $('#intrari_table_body').append(`
                        <tr>
                            <td>${value.denumire}</td>
                            <td>${value.tip}</td>
                            <td>${value.cantitate}</td>
                            <td>${value.date_in}</td>
                        </tr>
                    `);
                });
            } else {
                $('#intrari_table_body').empty();
                $('#intrari_table_body').append(`
                        <tr>
                            <td colspan="4">Nu sunt inregistrari</td>
                        </tr>
                    `);
            }
        },
        fail: function (response) {
            alert('Failed to load data, contact administrator');
        }
    });
}
function adu_list_produse_si_ambalaje() {
    $.ajax({
        url: "Intrari/adu_list_produse_si_ambalaje",
        method: "POST",
        data: { cautare: document.getElementById('cauta').value },
        success: function (response) {

            // parse data to json object
            var obj = JSON.parse(response);

            if (obj.length > 0) {

                // clean the table content
                $('#produse').empty();
                // list object
                $.each(obj, function (index, value) {
                    $('#produse').append(`
                    <option value="${value.denumire}">
                    `);
                });
            }
        },
        fail: function (response) {
            alert('Failed to load data, contact administrator');
        }
    });
}
function adaugaIntrare() {
    if (document.getElementById('cant').value != "" && document.getElementById('cant').value != 0) {
        $.ajax({
            url: "Intrari/adaugaIntrare",
            method: "POST",
            data: {
                cautare: document.getElementById('cauta').value,
                cantitate: document.getElementById('cant').value
            },
            success: function (response) {

                // parse data to json object
                var obj = JSON.parse(response);
                if(obj.message === "success") {
                    getintrari();
                } else {
                    alert(obj.message);
                }
                
            },
            fail: function (response) {
                alert('Failed to load data, contact administrator');
            }
        });
    } else {
        alert('Cantitatea trebuie sa fie mai mare decat 0!')
    }

}
function imprimare() {
    window.print();
}

function getIntrari_Raport(datepicker) {
    var filtrare_specific = document.getElementById('intrari_dupa').value;
    var data = $('#intrari_form').serializeArray();

    if (datepicker !== undefined) {
        datepicker_global = datepicker;
    }
    if (datepicker_global !== undefined) {
        data.push({ name: "start_date", value: document.getElementById('start_date').value });
        data.push({ name: "end_date", value: document.getElementById('end_date').value });
    }

    $.ajax({
        url: base_url+"Intrari/getIntrari",
        method: "POST",
        data: data,

        success: function (response) {

            // parse data to json object
            var obj = JSON.parse(response);

            if (obj.length > 0) {

                // clean the table content
                $('#intrari_table_body').empty();

                // list object
                $.each(obj, function (index, value) {
                    $('#intrari_table_body').append(`
                        <tr>
                            <td>${value.denumire}</td>
                            <td>${value.tip}</td>
                            <td>${value.cantitate}</td>
                            <td>${value.date_in}</td>
                        </tr>
                    `);
                });
            } else {
                $('#intrari_table_body').empty();
                $('#intrari_table_body').append(`
                        <tr>
                            <td colspan="4">Nu sunt inregistrari</td>
                        </tr>
                    `);
            }
        },
        fail: function (response) {
            alert('Failed to load data, contact administrator');
        }
    });
}

function date_range()
{
    getIntrari_Raport('daterange');
}