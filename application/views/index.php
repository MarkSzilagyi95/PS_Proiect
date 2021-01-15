<div class="container-fluid">
    <div class="card shadow">
        <div class="card-body">
            <div class="row">
            </div>
            <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                <div class="container">
                    <div class="table-wrapper">
                        <div class="table-title">
                            <form id="gestionare_form" method="post">
                                <div class="row">

                                    <div class="control-group mr-auto" id="daterange_picker_container">
                                        <div class="controls">
                                            <div class="input-prepend input-group">
                                                <input type="text" name="interval_date" id="interval_date" class="form-control" value="Perioada" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="dropdown mr-auto">
                                        <select id="mijloc_transport_dropdown" name="mijloc_transport" class="ui dropdown_gestionare" onchange="gettranzactii();">
                                            <!-- <option class="options" style="background: lightgrey;" value="">Mijloace de transport</option>
                                            <option class="options" value="angular">Angular</option>
                                            <option class="options" value="css">CSS</option> -->
                                        </select>
                                    </div>
                                    <div class="dropdown mr-auto">
                                        <select name="status_tranzactii" class="ui dropdown_gestionare" onchange="gettranzactii();">
                                            <option class="options" style="background: lightgrey;" value="">Status incarcare</option>
                                            <option class="options" value="Incarcat">Incarcat</option>
                                            <option class="options" value="Partial">Partial</option>
                                            <option class="options" value="Gol">Gol</option>
                                        </select>
                                    </div>


                                    <div class="descarca4">
                                        <a href="javascript:download_pdf();" class="btn btn-success"><i class="material-icons"></i> <span>PRINTEAZA</span></a>
                                    </div>

                                </div>
                            </form>
                        </div>


                        <table id="gestionare_table" class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>Denumire Transport</th>
                                    <th>Capacitate totala</th>
                                    <th>Cantitate incarcata</th>
                                    <th>Data</th>
                                </tr>
                            </thead>
                            <tbody id="gestionare_table_body">
                                <!-- <tr>
                                    <td>BH12SJZ</td>
                                    <td>33</td>
                                    <td>0</td>
                                    <td>2021-02-10</td>
                                </tr> -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">
            </div>
        </div>
    </div>
</div>


<script src="assets/js/jquery.min.js"></script>

<!-- <script src="assets/vendor/semantic_ui/semantic.min.js"></script> -->
<script src="assets/js/Index_page.js"></script>

</script>