      <div class="row">
          <div class="col-lg-12">
              <div class="card card-navy card-outline">
                  <div class="card">
                      <div class="card-header">
                          <span class="p text-gray card-title">After the user scans the barcode, the system automatically changes 'Status Presensi' to 'Already Present'.</span>
                      </div>
                      <div class="card-body">
                          <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#modal-lg-tambah-account">
                              <i class="fas fa-plus"></i>
                              <span> Tambah Akun Admin</span>
                          </button>
                          <div class="modal fade" id="modal-lg-tambah-account">
                              <div class="modal-dialog modal-lg">
                                  <div class="modal-content">
                                      <div class="modal-header bg-primary text-white">
                                          <span class="h5 font-weight-bold modal-title">Tambah Akun Admin</span>
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                              <span aria-hidden="true">&times;</span>
                                          </button>
                                      </div>
                                      <div class="modal-body">
                                          <form class="form-validate" method="post" action="<?= base_url('Admin/proses_account') . '?section=' . $title ?>" enctype="multipart/form-data">
                                              <div class="row">
                                                  <div class="col-sm-12">
                                                      <div class="form-group">
                                                          <label>Email Lengkap</label>
                                                          <input type="email" class="form-control" name="email" placeholder="Harap Gunakan @summerscape.com" required>
                                                          <small id="emailError" class="text-danger" style="display:none;">Email harus menggunakan domain @summerscape.com</small>
                                                      </div>
                                                  </div>
                                              </div>
                                              <div class="row">
                                                  <div class="col-sm-6">
                                                      <div class="form-group">
                                                          <label>Password</label>
                                                          <input type="password" class="form-control" id="password1" name="password" required>
                                                      </div>
                                                  </div>
                                                  <div class="col-sm-6">
                                                      <div class="form-group">
                                                          <label>Konfirmasi Password</label>
                                                          <input type="password" class="form-control" id="confirm_password" required>
                                                          <small id="passwordError" class="text-danger" style="display:none;">Password dan konfirmasi password harus sama</small>
                                                      </div>
                                                  </div>
                                              </div>
                                              <div class="modal-footer justify-content-between">
                                                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                  <button type="submit" class="btn btn-primary" onclick="return confirm('Apakah anda yakin Data Sudah Benar? Harap perhatikan kembali isian data untuk menghindari terjadinya sistem eror.')" disabled>Submit</button>
                                              </div>
                                          </form>
                                          <script>
                                              document.addEventListener("DOMContentLoaded", function() {
                                                  const emailInput = document.querySelector("input[name='email']");
                                                  const passwordInput = document.getElementById("password1");
                                                  const confirmPasswordInput = document.getElementById("confirm_password");
                                                  const submitButton = document.querySelector("button[type='submit']");
                                                  const emailError = document.getElementById("emailError");
                                                  const passwordError = document.getElementById("passwordError");

                                                  // Fungsi untuk memeriksa email memiliki domain @summerscape.com
                                                  function validateEmail() {
                                                      const emailValue = emailInput.value;
                                                      if (!emailValue.endsWith("@summerscape.com")) {
                                                          emailError.style.display = "block";
                                                          emailInput.setCustomValidity("Email harus menggunakan domain @summerscape.com.");
                                                      } else {
                                                          emailError.style.display = "none";
                                                          emailInput.setCustomValidity("");
                                                      }
                                                  }

                                                  function validatePasswords() {
                                                      if (passwordInput.value !== confirmPasswordInput.value) {
                                                          passwordError.style.display = "block";
                                                          confirmPasswordInput.setCustomValidity("Password dan konfirmasi password harus sama.");
                                                      } else {
                                                          passwordError.style.display = "none";
                                                          confirmPasswordInput.setCustomValidity("");
                                                      }
                                                  }

                                                  // Event listener untuk memeriksa email setiap kali input berubah
                                                  emailInput.addEventListener("input", validateEmail);

                                                  // Event listener untuk memeriksa kesesuaian password setiap kali salah satu input berubah
                                                  passwordInput.addEventListener("input", validatePasswords);
                                                  confirmPasswordInput.addEventListener("input", validatePasswords);

                                                  // Men-disable submit button jika ada input yang tidak valid
                                                  document.querySelector("form").addEventListener("input", function() {
                                                      submitButton.disabled = !emailInput.checkValidity() || !confirmPasswordInput.checkValidity();
                                                  });
                                              });
                                          </script>
                                      </div>
                                  </div>
                              </div>
                          </div>
                          <table id="example_account" class="table table-bordered table-striped">
                              <thead class="text-center">
                                  <tr class="text-uppercase text-white align-center">
                                      <th class="align-middle bg-navy">EMAIL</th>
                                      <th class="align-middle bg-navy">PASSWORD</th>
                                      <th class="align-middle bg-navy">ACTION</th>
                                  </tr>
                              </thead>
                              <tbody class="text-center">
                                  <?php
                                    $no = 1;
                                    foreach ($account as $ac) :
                                    ?>
                                      <tr>
                                          <td><?= $ac->email ?></td>
                                          <td><?= $ac->password ?></td>
                                          <td align="center">
                                              <a href="<?= site_url('admin/delete_account/' . $ac->id . '?section=' . $title) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin Data Account akan dihapus permanen?')">
                                                  <i class=" fas fa-trash"></i>
                                              </a>
                                          </td>
                                      </tr>
                                  <?php endforeach; ?>
                              </tbody>
                          </table>
                      </div>
                  </div>
              </div>
          </div>
      </div>