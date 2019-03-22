<div class="row">
    <div class="col-lg-12">
        <div class="box box-default">
            <div style="margin-left:10px;">
                <button class="btn bg-olive margin" onclick="tambah()"><i class="glyphicon glyphicon-plus"></i> Add Person</button>
                <button class="btn" onclick="reload_table()"><i class="glyphicon glyphicon-refresh"></i> Reload</button>
            </div>
            <div class="box-body">
                <table id="table" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Gender</th>
                            <th>Alamat</th>
                            <th>Tanggal lahir</th>
                            <th style="width:225px;">Action</th>
                        </tr>
                    </thead>
                    <tbody id="data-person">
                    </tbody>

                </table>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap modal -->
<div class="modal fade" id="modal_form" >
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 Class="modal-title">Person Modal</h4>
            </div>
            <div class="modal-body form">
                <form action="#" id="form" class="form-horizontal">
                    <input type="hidden" name="id" value="">
                    <div class="form-group">
                        <label for="nama" class="col-sm-3 control-label">Nama</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="nama" name="nama">
                            <span class="help-block"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="gender" class="col-sm-3 control-label">Gender</label>
                        <div class="col-sm-8">
                            <select name="gender" class="form-control">
                                <option value="">--Pilih Gender--</option>
                                <option value="laki">Laki-laki</option>
                                <option value="perempuan">Perempuan</option>
                            </select>
                            <span class="help-block"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="alamat" class="col-sm-3 control-label">Alamat</label>
                        <div class="col-sm-8">
                            <textarea class="form-control" name="alamat"></textarea>
                            <span class="help-block"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="tgl_lahir" class="col-sm-3 control-label">Tanggal Lahir</label>
                        <div class="col-sm-8 input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <input type="text" name="tgl_lahir" id="tgl_lahir" class="form-control" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask>
                            <span class="help-block"></span>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary"  onclick="simpan()" id="btnSave">Simpan</button>
            </div>
        </div><!-- modal-content -->
    </div><!-- modal-dialog -->
</div><!-- modal fade -->