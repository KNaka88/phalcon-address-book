<?php
/**
 * @var \Phalcon\Mvc\View\Engine\Php $this
 */
?>
<?php use Phalcon\Tag; ?>

<?php echo $this->getContent(); ?>


<div class="page-header">
    <h1>Search Result</h1>
</div>


<div class="row">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Id</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Contact Number</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($page->items as $user): ?>
                <tr>
                    <td><?php echo $user->id ?></td>
                    <td><?php echo $user->firstName ?></td>
                    <td><?php echo $user->lastName ?></td>
                    <td><?php echo $user->email ?></td>
                    <td><?php echo $user->contactNumber ?></td>
                    <td><?php echo $this->tag->linkTo(["users/edit/" . $user->id, "Edit"]); ?></td>
                    <td><?php echo $this->tag->linkTo(["users/delete/" . $user->id, "Delete"]); ?></td>
                </tr>
              <?php endforeach; ?>
        </tbody>
    </table>
</div>

<div class="row">
  <div class="col-sm-1">
      <p class="pagination">
          <?php echo $page->current, "/", $page->total_pages ?>
      </p>
  </div>
  <div class="col-sm-11">
  </div>
</div>
<div class="col-sm-11">
  <nav>
    <ul class="pagination">
        <li><?php echo $this->tag->linkTo("users/search", "First") ?></li>
        <li><?php echo $this->tag->linkTo("users/search?page=" . $page->before, "Previous") ?></li>
        <li><?php echo $this->tag->linkTo("users/search?page=" . $page->next, "Next") ?></li>
        <li><?php echo $this->tag->linkTo("users/search?page=" . $page->last, "Last") ?></li>
    </ul>
  </nav>

</div>
