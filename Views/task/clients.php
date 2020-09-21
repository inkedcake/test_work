<div class="container">
    <h1>Add client</h1>

    <form action="/task/addClients" method="post" class="form-inline">
        <div class="form-group">
            <input type="text" class="form-control mb-2 mr-sm-2" name="full_name" aria-describedby="full_name" placeholder="Enter full name">
        </div>
        <div class="form-group">
            <input type="text" class="form-control mb-2 mr-sm-2" name="phone" aria-describedby="login" placeholder="Enter phone">
        </div>

        <button type="submit" class="btn btn-primary mb-2">Submit</button>
    </form>
<br>
    <h2>Clients list</h2>
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Phone</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $i=1;
        foreach ($this->clients as $client):?>
            <tr>
                <th scope="row"><?php echo $i?></th>
                <td><?php echo $client['full_name']?></td>
                <td><?php echo $client['phone']?></td>

            </tr>
            <?php
            $i++;
        endforeach;?>
        </tbody>
    </table>
</div>