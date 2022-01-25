<section class="team-boxed">
        <div class="container">
            <div class="intro">
                <h2 class="text-center">Suppliers</h2>
                <p class="text-center">These are the suppliers that help Treaty Market. Without them we wouldn't be able to have all the amazing fresh vegetables, fruit and everything else that we offer !!!</p>
            </div>
            <div class="row people">
                <?php foreach($sup as $supItem): ?>
                <div class="col-md-6 col-lg-4 item">
                    <div class="box"><img class="rounded-circle" src="assets/images/suppliers/<?= $supItem['photo'] ?>">
                        <h3 class="name"><?= $supItem['name'] ?></h3>
                        <p class="description">Contact : <?= $supItem['contact']?><br>Phone : <?= $supItem['phone']?><br>Address : <?= $supItem['address']?></p>
                        <div class="social"><a href="#"><i class="fa fa-facebook-official"></i></a><a href="#"><i class="fa fa-twitter"></i></a><a href="#"><i class="fa fa-instagram"></i></a></div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>