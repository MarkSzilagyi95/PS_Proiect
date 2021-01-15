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
                                        <select id="iesire_dupa" name="iesire_dupa" class="ui dropdown_gestionare" onchange="getIesiri();">
                                            <option class="options" style="background: lightgrey;" value="">Iesire dupa</option>
                                            <option class="options" value="Produse">Produse</option>
                                            <option class="options" value="Ambalaje">Ambalaje</option>
                                        </select>
                                    </div>
                                    <div class="descarca">
                                        <a href="javascript:download_pdf();" class="btn btn-success"><i class="material-icons"></i> <span>PRINTEAZA</span></a>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <table class="table table-striped table-hover">
                            <thead id="iesire_table_header">

                            </thead>
                            <tbody id="iesire_table_body">

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
<script src="assets/js/Iesiri_page.js"></script>