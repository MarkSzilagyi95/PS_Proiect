var datepicker_global = undefined;
function gettranzactii(datepicker)
{
    var data = $('#gestionare_form').serializeArray();
    if(datepicker !== undefined) {
        datepicker_global = datepicker;
    }
    if(datepicker_global !== undefined) {
        data.push({name: "start_date", value: document.getElementById('start_date').value});
        data.push({name: "end_date", value: document.getElementById('end_date').value});
    }
    // alert(document.getElementById('start_date').value);
    // alert(document.getElementById('end_date').value);
    $.ajax({
        url: "Index/gettranzactii",
        method: "POST",
        data: data,

        success: function(response) {
            
            // parse data to json object
            var obj = JSON.parse(response);
            
            if(obj.length > 0) {
                
                // clean the table content
                $('#gestionare_table_body').empty();

                // list object
                $.each(obj, function (index, value) {
                    $('#gestionare_table_body').append(`
                        <tr>
                            <td>${value.denumire}</td>
                            <td>${value.capacitate}</td>
                            <td>${value.cantitate_incarcat}</td>
                            <td>${value.created_at}</td>
                        </tr>
                    `);
                });
            } else {
                $('#gestionare_table_body').empty();
                $('#gestionare_table_body').append(`
                        <tr>
                            <td colspan="4">Nu sunt inregistrari</td>
                        </tr>
                    `);
            }
        },
        fail: function(response) {
            alert('Failed to load data, contact administrator');
        }
    });
}
function getMijloaceDeTransport()
{
    $.ajax({
        url: "Index/getMijloaceDeTransport",
        method: "POST",

        success: function(response) {
            
            // parse data to json object
            var obj = JSON.parse(response);
            
            if(obj.length > 0) {
                
                // clean the table content
                $('#mijloc_transport_dropdown').empty();
                $('#mijloc_transport_dropdown').append(`
                <option class="options" value="any">Mijloace de transport</option>
                `);
                // list object
                $.each(obj, function (index, value) {
                    $('#mijloc_transport_dropdown').append(`
                    <option class="options" value="${value.denumire}">${value.denumire}</option>
                    `);
                });
            }
        },
        fail: function(response) {
            alert('Failed to load data, contact administrator');
        }
    });
}
function download_pdf() {
    window.print();
}
function date_range()
{
    gettranzactii('daterange');
}
getMijloaceDeTransport();
gettranzactii();