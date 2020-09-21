<form class="form-inline d-flex justify-content-center">
    <select name="clients" class="input-group mb-2 mr-sm-2 form-control" id="clients">
        <option>Chose client</option>
        <?php
        foreach ($this->clients as $client):?>
            <option value="<?php echo $client['full_name'] ?>"
                    data-phone="<?php echo $client['phone']; ?>"><?php echo $client['full_name'] ?></option>
        <?php endforeach; ?>
    </select>

    <label class="sr-only" for="phone">Phone</label>
    <div class="input-group mb-2 mr-sm-2">
        <div class="input-group-prepend">
            <div class="input-group-text">+38</div>
        </div>
        <input type="text" class="form-control" id="phone" value="" placeholder="Phone">
    </div>
    <input type="datetime-local" class="form-control mb-2 mr-sm-2" id="remind_at">
    <button type="submit" id="btn_submit_note" class="btn btn-primary mb-2">Submit</button>
</form>
<br>

<table class="table table-striped">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">Phone</th>
        <th scope="col">Date</th>
        <th scope="col"></th>
    </tr>
    </thead>
    <tbody>
    <?php
    $i = 1;
    foreach ($this->notes as $note):?>
        <tr>
            <th scope="row"><?php echo $i ?></th>
            <td><?php echo $note['full_name'] ?></td>
            <td><?php echo $note['phone'] ?></td>
            <td class="date_time_end"><?php echo $note['remind_at'] ?></td>
            <td>
                <a href="<?php echo URL . 'calendar/deleteNote?id=' . $note['id'] ?>">
                    <button class="btn btn-outline-success " type="button">Delete</button>
                </a>
            </td>

        </tr>
        <?php
        $i++;
    endforeach; ?>
    </tbody>
</table>