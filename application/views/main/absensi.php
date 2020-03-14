<?php $this->load->view("main/header"); ?>


								<div class="card shadow mb-4">
									<!-- Card Header - Dropdown -->
									<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
										<h6 class="m-0 font-weight-bold text-primary"></h6>
										<div class="dropdown no-arrow"></div>
									</div>
									<!-- Card Body -->
									<div class="card-body">
										<script type="text/javascript">

											var table = null;

											$(document).ready(function() {
												table = $('#tableData').DataTable({
														"processing": true,
														"serverSide": true,
														"ordering": true,
														"order": [[ 0, 'asc' ]],
														"ajax": {
															"url": "<?php echo base_url().'api/data/'.$data["url_web"]["class"]; ?>",
															"type": "POST"
														},
														"deferRender": true,
														"aLengthMenu": [[10, 25, 50],[10, 25, 50]],
														"columns": [
															{ "data": "npp" }
															,{ "data": "nama_pegawai" }
															,{ "render": function ( data, type, row) {
																	var html  = "<a class='btn btn-warning btn-sm item_edit' href='javascript:void(0);' id = '" + row.id_pegawai + "' name = '" + row.id_pegawai + "' rel = '" + row.id_pegawai + "'><span class='fas fa-edit'></span></a> "
																	return html;
																}
															}
														],
													});

												//get data for update record
												$('#showData').on('click','.item_edit',function() {
													var id = $(this).attr("id");
													$('#frmAdd')[0].reset(); // reset form on modals
													$('.form-group').removeClass('has-error'); // clear error class
													$('.help-block').empty(); // clear error string
													//Ajax Load data from ajax
													$.ajax({
														url : "<?php echo base_url()."api/get/".$data["url_web"]["class"]."/"; ?>" + id,
														type: "GET",
														dataType: "JSON",
														success: function(data) {
															$('[name="txtIdPegawai"]').val(data.result.id_pegawai);
															$('[name="txtNPP"]').val(data.result.npp);
															$('[name="txtNamaPegawai"]').val(data.result.nama_pegawai);
															$('#ModalAdd').modal('show');
														}, error: function (jqXHR, textStatus, errorThrown) {
															alert(JSON.stringify(jqXHR));
															alert('Error get data from ajax');
														}
													});
												});

												/* update data */
												$('#btnAdd').on('click', function() {
													$('#btnAdd').text('Saving...'); //change button text
													$('#btnAdd').attr('disabled', true); //set button disable 
													$.ajax({
														type : "POST",
														url  : "<?php echo base_url()."api/put/".$data["url_web"]["class"]."-overtime"; ?>",
														dataType : "JSON",
														data : $('#frmAdd').serialize(),
														success: function(data) {
															if(data.status) {
																$('[name="txtIdPegawai"]').val("");
																$('[name="txtNPP"]').val("");
																$('[name="txtNamaPegawai"]').val("");
																$('[name="txtJamMulai"]').val("");
																$('[name="txtJamSelesai"]').val("");
																$('[name="txtAlasanLembur"]').val("");
																$('#ModalAdd').modal('hide');
																table.ajax.reload(null, false); //reload datatable ajax
															} else {
																$('.form-group').removeClass('has-error'); // clear error class
																$('.help-block').empty(); // clear error string
																for (var i = 0; i < data.inputerror.length; i++)  {	
																	//select parent twice to select div form-group class and add has-error class
																	$('[name="'+data.inputerror[i]+'"]').parent().parent().addClass('has-error');
																	//select span help-block class set text error string
																	$('[name="'+data.inputerror[i]+'"]').next().text(data.error_string[i]);
																}
															}
															$('#btnAdd').text('Save'); //change button text
															$('#btnAdd').attr('disabled', false); //set button enable 
														}, error: function (jqXHR, textStatus, errorThrown) {
															alert(JSON.stringify(jqXHR));
															alert('Error save data');
															$('#btnAdd').text('Save'); //change button text
															$('#btnAdd').attr('disabled', false); //set button enable 
														}
													});
													return false;
												});

											});
										</script>

										<table class="table table-striped" id="tableData">
											<thead>
												<tr>
													<?php echo $data["th"]; ?>
												</tr>
											</thead>
											<tbody id="showData"></tbody>
										</table>

										<!-- MODAL ADD -->
										<div class="modal fade" id="ModalAdd" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
											<div class="modal-dialog modal-lg" role="document">
												<div class="modal-content">
													<form id="frmAdd" name="frmAdd">
														<div class="modal-header">
															<h5 class="modal-title" id="exampleModalLabel"><?php echo $data["title"]; ?></h5>
															<button type="button" class="close" data-dismiss="modal" aria-label="Cancel">
															<span aria-hidden="true">&times;</span>
															</button>
														</div>
														<div class="modal-body">
															<input type="hidden" value="" name="txtIdPegawai"/>
															<div class="form-group row">
																<label class="col-md-3 col-form-label">NPP</label>
																<div class="col-md-9">
																	<input type="text" name="txtNPP" id="txtNPP" class="form-control" autocomplete="off" placeholder="NPP" readonly>
																	<small class="text-danger">
																		<span class="help-block"></span>
																	</small>
																</div>
															</div>
															<div class="form-group row">
																<label class="col-md-3 col-form-label">Nama Pegawai</label>
																<div class="col-md-9">
																	<input type="text" name="txtNamaPegawai" id="txtNamaPegawai" class="form-control" autocomplete="off" placeholder="Nama Pegawai" readonly>
																	<small class="text-danger">
																		<span class="help-block"></span>
																	</small>
																</div>
															</div>															
															<div class="form-group row">
																<label class="col-md-3 col-form-label">Jam Mulai</label>
																<div class="col-md-9">
																	<input type="text" name="txtJamMulai" id="txtJamMulai" class="form-control" autocomplete="off" placeholder="Jam Mulai" value="<?php echo $data["config_web"]["jam_mulai"]?>" readonly>
																	<small class="text-danger">
																		<span class="help-block"></span>
																	</small>
																</div>
															</div>
															<div class="form-group row">
																<label class="col-md-3 col-form-label">Jam Selesai</label>
																<div class="col-md-9">
																	<input type="text" name="txtJamSelesai" id="txtJamSelesai" class="form-control" autocomplete="off" placeholder="Jam Selesai">
																	<small class="text-danger">
																		<span class="help-block"></span>
																	</small>
																</div>
															</div>
															<div class="form-group row">
																<label class="col-md-3 col-form-label">Alasan Lembur</label>
																<div class="col-md-9">
																	<input type="text" name="txtAlasanLembur" id="txtAlasanLembur" class="form-control" autocomplete="off" placeholder="Alasan Lembur">
																	<small class="text-danger">
																		<span class="help-block"></span>
																	</small>
																</div>
															</div>															
														</div>
														<div class="modal-footer">
															<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
															<button type="button" type="submit" id="btnAdd" class="btn btn-primary">Save</button>
														</div>
													</form>
												</div>
											</div>
										</div>
										<!--END MODAL ADD-->	

									</div>
								</div>

<?php $this->load->view("main/footer"); ?>