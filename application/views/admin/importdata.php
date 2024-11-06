 <div class="row">
     <!-- left column -->
     <div class="col-md-12">
         <div class="card card-navy">
             <div class="card-header">
                 <span class="p text-white card-title" style="font-size: 14px;">Silahkan menguduh dan mengisi "Contoh Formal Excel" jika ingin mengimport dataset baru untuk menghindari terjadinya sistem error.</span>
             </div>
             <form method="post" action="<?= site_url('admin/importdatapeserta?section=' . $title) ?>" enctype="multipart/form-data">
                 <?php
                    $tanggal = date('Y/m/d');
                    ?>
                 <input type="hidden" name="tgl_input" value="<?php echo $tanggal; ?>">
                 <div class="card-body ">
                     <div class="form-row ">
                         <div class="col-lg-3">
                             <div class="form-group text-center">
                                 <a href="<?= base_url('assets/excel/TEMPLATE_SUMMER.xlsx') ?>" target="_blank">
                                     <img src="<?= base_url('assets/image/exl.png') ?>" alt="Avatar" style="max-width: 100%; width: 300px;height: auto;">
                                 </a>
                             </div>
                         </div>
                         <div class="col-lg-9">
                             <div class="form-group">
                                 <label for="exampleInputFile">Upload File</label>
                                 <div class="input-group">
                                     <div class="custom-file">
                                         <input type="file" class="form-control-file text-center" id="file" name="file" required>
                                     </div>
                                 </div>
                             </div>
                         </div>
                     </div>
                     <?php if ($this->session->userdata('level') === '0'): ?>
                         <div class="form-group">
                             <label>Status Presensi</label>
                             <select name="status_presensi" id="status_presensi" class="form-control" required>
                                 <option value="PREPARE">PREPARE</option>
                                 <option value="SUCCESS">SUCCESS</option>
                                 <option value="FAILED">FAILED</option>
                             </select>
                         </div>
                     <?php endif; ?>
                 </div>
                 <!-- /.card-body -->
                 <div class="card-footer">
                     <button type="submit" class="btn btn-primary" onclick="return confirm('Apakah anda yakin Data Sudah Benar? Harap perhatikan kembali file untuk menghindari terjadinya sistem eror.')">Submit</button>
                 </div>
             </form>
         </div>
     </div>
 </div>