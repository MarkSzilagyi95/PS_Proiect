var datepicker_global = undefined;
function date_range() {
    getIesiri('daterange');
}

function getIesiri(datepicker) {
    var filtrare_specific = document.getElementById('iesire_dupa').value;
    var data = $('#gestionare_form').serializeArray();

    if (datepicker !== undefined) {
        datepicker_global = datepicker;
    }
    if (datepicker_global !== undefined) {
        data.push({ name: "start_date", value: document.getElementById('start_date').value });
        data.push({ name: "end_date", value: document.getElementById('end_date').value });
    }

    $.ajax({
        url: "Iesiri/getIesiri",
        method: "POST",
        data: data,

        success: function (response) {

            // parse data to json object
            var obj = JSON.parse(response);

            // clean the table content
            $('#iesire_table_body').empty();
            $('#iesire_table_header').empty();
            if (filtrare_specific !== "") {
                if (filtrare_specific == "Produse") {
                    $('#iesire_table_header').append(`
                    <tr>
                        <th>Denumire produs</th>
                        <th>Cantitate</th>
                        <th>Data</th>
                    </tr>
                    `);
                } else if (filtrare_specific == "Ambalaje") {
                    $('#iesire_table_header').append(`
                    <tr>
                        <th>Tip ambalaj</th>
                        <th>Cantitate</th>
                        <th>Data</th>
                    </tr>
                    `);
                } else {
                    alert('contact admin x040 error!');
                }
            } else {
                $('#iesire_table_header').append(`
                <tr>
                    <th>Denumire produs</th>
                    <th>Tip ambalaj</th>
                    <th>Cantitate</th>
                    <th>Data</th>
                </tr>
                `);
            }

            if (obj.length > 0) {
                if (filtrare_specific !== "") {
                    if (filtrare_specific == "Produse") {
                        $.each(obj, function (index, value) {
                            $('#iesire_table_body').append(`
                                <tr>
                                    <td>${value.produs_nume}</td>
                                    <td>${value.produse_iesite}</td>
                                    <td>${value.created_at}</td>
                                </tr>
                            `);
                        });
                    } else if (filtrare_specific == "Ambalaje") {
                        $.each(obj, function (index, value) {
                            $('#iesire_table_body').append(`
                                <tr>
                                    <td>${value.ambalaj_nume}</td>
                                    <td>${value.produse_iesite}</td>
                                    <td>${value.created_at}</td>
                                </tr>
                            `);
                        });
                    } else { }
                } else {
                    $.each(obj, function (index, value) {
                        $('#iesire_table_body').append(`
                            <tr>
                                <td>${value.produs_nume}</td>
                                <td>${value.ambalaj_nume}</td>
                                <td>${value.produse_iesite}</td>
                                <td>${value.created_at}</td>
                            </tr>
                        `);
                    });
                }
            } else {
                $('#iesire_table_body').empty();
                $('#iesire_table_body').append(`
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
function download_pdf() {
    window.print();
}
getIesiri();