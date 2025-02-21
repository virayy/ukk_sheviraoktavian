<main id="main" class="main">

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body text-center"> <!-- Tambahkan kelas text-center -->
                        <!-- Card Title -->
                        <h5 class="card-title">
                            SELAMAT BERHITUNG !
                            <strong>
                                <?= session()->get('nama') ? htmlspecialchars(session()->get('nama'), ENT_QUOTES, 'UTF-8') : ''; ?>
                            </strong>
                        </h5>
                        
                        <!-- Konten tambahan -->
                        <p>
                           
                        </p>
                    </div>
                </div><!-- End Card -->

            </div><!-- End Column -->
        </div><!-- End Row -->
    </section><!-- End Section -->

</main><!-- End #main -->
