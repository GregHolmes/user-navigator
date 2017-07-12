            <section id="main">
            <section id="content">
                <div class="container">


                    <div class="col-sm-12">                                                                      
                        <div class="card profile-view">
                            <div class="pv-header">
                                <img src="<?= base_url(); ?>uploads/dp/thumbs/<?= $this->session->userdata('logged_in')['avatar']; ?>" class="pv-main" alt="">
                            </div>
                            
                            <div class="pv-body">
                                <h3> Logged in as : <strong class="c-red"><?= $this->session->userdata('logged_in')['username']; ?></strong></h3><br>
                                <h2>Account Status : <strong class="c-green">Superuser</strong></h2>             
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            </section>