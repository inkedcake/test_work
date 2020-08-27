<form class="form-inline d-flex justify-content-center">
    <select name="managers" class="input-group mb-2 mr-sm-2 form-control" id="managers">
        <option>Chose manager</option>
        <?php
        foreach ($this->managers as $manager):?>
            <option value="<?php echo $manager['id']?>"><?php echo $manager['full_name'].($_SESSION['manager_id']==$manager['id']? " (You)":'')?></option>
        <?php endforeach;?>
    </select>
    <select name="clients" class="input-group mb-2 mr-sm-2 form-control" id="clients">
        <option>Chose client</option>
        <?php
        foreach ($this->clients as $client):?>
        <option value="<?php echo $client['id']?>" data-phone="<?php echo $client['phone'];?>"><?php echo $client['full_name']?></option>
        <?php endforeach;?>
    </select>

    <label class="sr-only" for="inlineFormInputGroupPhone2">Phone</label>
    <div class="input-group mb-2 mr-sm-2">
        <div class="input-group-prepend">
            <div class="input-group-text">+38</div>
        </div>
        <input type="text" class="form-control" id="inlineFormInputGroupPhone2" value="" placeholder="Phone">
    </div>
    <input type="datetime-local" class="form-control mb-2 mr-sm-2" id="date_time">
    <input type="text" class="form-control mb-2 mr-sm-2" id="inlineFormInputText" placeholder="Текст заметки">

    <button type="submit" id="btn_submit" class="btn btn-primary mb-2">Submit</button>
</form>
<br>
<table class="table table-striped">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">Phone</th>
        <th scope="col">Date</th>
        <th scope="col">Text</th>
        <th scope="col"></th>
    </tr>
    </thead>
    <tbody>
    <?php
    $i=1;
    foreach ($this->tasks as $task):?>
        <tr>
        <th scope="row"><?php echo $task['id']?></th>
        <td><?php echo $task['full_name']?></td>
        <td><?php echo $task['phone']?></td>
        <td class="date_time_end"><?php echo $task['date_time']?></td>
        <td><?php echo $task['text_task']?></td>
            <td>
                <a href="<?php echo URL.'dashboard/deleteTask?id='.$task['0']?>">
                    <button class="btn btn-outline-success " type="button">Delete</button>
                </a>
            </td>

    </tr>
   <?php
    $i++;
    endforeach;?>
    </tbody>
</table>