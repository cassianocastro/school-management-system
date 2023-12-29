<!-- Info boxes -->
<div class="card">
  <div class="card-header py-2">
    <h3 class="card-title">New Study-Material</h3>
  </div>

  <div class="card-body">
    <form action="./" method="post" enctype="multipart/form-data">
      <div class="form-group">
        <label for="name">Title</label>

        <input type="text" name="title" placeholder="Enter the title" class="form-control">
      </div>

      <div class="form-group">
        <label for="description">Description</label>

        <textarea id="description" name="description" placeholder="Enter the description" cols="30" rows="10" class="form-control"></textarea>
      </div>

      <div class="form-group">
        <label for="class">Class</label>

        <select name="class" id="class" class="form-control" required>
          <option value="" label="Select"></option>
          <?php foreach ( $classes as $class ) : ?>
            <option value="<?= $class->id ?>" label="<?= $class->title ?>"></option>
          <?php endforeach; ?>
        </select>
      </div>

      <div class="form-group">
        <label for="subject">Your Subject</label>

        <select name="subject" id="subject" class="form-control" required>
          <option value="" label="Select"></option>
          <?php foreach ( $subjects as $subject ) : ?>
            <option value="<?= $subject->id ?>" label="<?= $subject->title ?>"></option>
          <?php endforeach; ?>
        </select>
      </div>

      <div class="form-group">
        <input type="file" name="attachment" id="attachment" required>
      </div>

      <button type="submit" name="submit" class="btn btn-success">Submit</button>
    </form>
  </div>
</div>