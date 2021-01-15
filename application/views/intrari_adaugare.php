<div class="container-fluid">
    <div class="card shadow">
        <div class="card-body">
            <div class="row">
            </div>
            <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                <div class="container">
                    <div class="table-wrapper">
                        <div class="table-title">
                            <div class="row">
                                <div class="dropdown mr-auto">
                                    <div class="quantity mr-auto">
                                        <input type="text" list="produse" id="cauta" onkeyup="adu_list_produse_si_ambalaje();" name="cauta" placeholder="Cauta" value="">
                                        <datalist id="produse">

                                        </datalist>
                                    </div>
                                </div>
                                <div class="quantity mr-auto">
                                    <input type="number" id="cant" name="cantitate" placeholder="Cantitate" value="">
                                </div>
                                <div class="add mr-auto">
                                    <button class="btn btn-info btn-sm float-right" onclick="adaugaIntrare();" type="submit">Adauga</button>
                                </div>
                                <div class="descarca">
                                    <a href="javascript:imprimare();" class="btn btn-success"><i class="material-icons"></i> <span>IMPRIMARE</span></a>
                                </div>
                            </div>
                        </div>
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>Denumire</th>
                                    <th>Tip</th>
                                    <th>Cantitate</th>
                                    <th>Data</th>
                                </tr>
                            </thead>
                            <tbody id="intrari_table_body">
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
<script src="assets/js/Intrari_page.js"></script>
<script>
    adu_list_produse_si_ambalaje();
    getintrari();
</script>