function getInventar(datepicker) {
    var filtrare_specific = document.getElementById('inventar_dupa').value;
    var data = $('#gestionare_form').serializeArray();

    if (filtrare_specific == "Transport") {
        $.ajax({
            url: "Inventar/getMijloaceTransport",
            method: "POST",
            data: data,

            success: function (response) {
                $('#iesire_table_body').empty();
                $('#iesire_table_header').empty();

                $('#iesire_table_header').append(`
                    <tr>
                        <th>Denumire transport</th>
                        <th>Capacitate</th>
                        <th>Ultima actualizare</th>
                    </tr>
                    `);

                var obj = JSON.parse(response);
                $.each(obj, function (index, value) {
                    $('#iesire_table_body').append(`
                    <tr>
                        <td>${value.denumire}</td>
                        <td>${value.capacitate}</td>
                        <td>${value.updated_at}</td>
                    </tr>
                `);
                });
            }


        });
    } else {
        $.ajax({
            url: "Inventar/getInventar",
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
                    </tr>
                    `);
                    } else if (filtrare_specific == "Ambalaje") {
                        $('#iesire_table_header').append(`
                    <tr>
                        <th>Denumire ambalaj</th>
                        <th>Cantitate</th>
                    </tr>
                    `);
                    } else {
                        alert('contact admin x040 error!');
                    }
                } else {
                    $('#iesire_table_header').append(`
                <tr>
                    <th>Denumire produs</th>
                    <th>Cantitate</th>
                    <th>Denumire ambalaj</th>
                    <th>Cantitate</th>
                </tr>
                `);
                }

                if (obj.length > 0) {
                    if (filtrare_specific !== "") {
                        if (filtrare_specific == "Produse") {
                            $.each(obj, function (index, value) {
                                $('#iesire_table_body').append(`
                                <tr>
                                    <td>${value.nume_produs}</td>
                                    <td>${value.cantitate_inventar_produs}</td>
                                </tr>
                            `);
                            });
                        } else if (filtrare_specific == "Ambalaje") {
                            $.each(obj, function (index, value) {
                                $('#iesire_table_body').append(`
                                <tr>
                                    <td>${value.nume_ambalaj}</td>
                                    <td>${value.cantitate_inventar_ambalaj}</td>
                                </tr>
                            `);
                            });
                        } else { }
                    } else {
                        $.each(obj, function (index, value) {
                            $('#iesire_table_body').append(`
                            <tr>
                                <td>${value.nume_produs}</td>
                                <td>${value.cantitate_inventar_produs}</td>
                                <td>${value.nume_ambalaj}</td>
                                <td>${value.cantitate_inventar_ambalaj}</td>
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
}
function download_pdf() {
    window.print();
}
getInventar();