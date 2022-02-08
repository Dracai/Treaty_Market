<section class="forum-section">
    <div class='container'>
        <?php if (session()->get('deletedUser')): ?>
            <div class="alert alert-danger" role="alert" style="margin-top: 1em; text-align: center;">
                <?= session()->get('deletedUser')?>
            </div>
        <?php endif; ?>
        <?php if (session()->get('userBanned')): ?>
            <div class="alert alert-danger" role="alert" style="margin-top: 1em; text-align: center;">
                <?= session()->get('userBanned')?>
            </div>
        <?php endif; ?>
        <h1 class="text-center" style="margin-top: 1em; font-weight: 600;">Customers</h1>
    <form action="<?php echo base_url();?>/viewUsers" method = "post" style="margin-top: 2em; ">
        <label for="searchID">Search by Customer Number :</label>
            <input type="text" name ="searchID" id="searchID"/>
        <input type="submit" value="Search"/>
    </form>

    <?php if($customers): ?>
    <table class="table table-striped table-hover" style="margin-top: 3em;">
        <thead>
            <tr>
            <th scope="col">Customer No</th>
            <th scope="col">First Name</th>
            <th scope="col">LastName</th>
            <th scope="col">Phone</th>
            <th scope="col">Email</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($customers as $aCust): ?>
            <tr class="table-default">
            <th scope="row"><?= $aCust['customerNumber'] ?></th>
            <td><?= $aCust['contactFirstName'] ?></td>
            <td><?= $aCust['contactLastName'] ?></td>
            <td><?= $aCust['phone'] ?></td>
            <td><?= $aCust['email'] ?></td>
            <td>
                <a href="<?php echo site_url('Administrator/banCustomer/'.$aCust['customerNumber']); ?>" 
                onclick="return confirm('Do you want to ban this User?');">
                    <button id="button_delete" type="button" class="btn btn-primary" style="border-radius: 4px;">Ban</button>
                </a>
            </td>
            <td>
                <a href="<?php echo site_url('Administrator/delCustomer/'.$aCust['customerNumber']); ?>" 
                onclick="return confirm('Do you want to delete this Customer?');">
                    <button id="button_delete" type="button" class="btn btn-primary" style="border-radius: 4px;">Delete</button>
                </a>
            </td>
            </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <h3 style="text-align: center;">There is no users !</h3>
        </tbody>
    </table>
    <?php endif; ?>
    </div>
</section>