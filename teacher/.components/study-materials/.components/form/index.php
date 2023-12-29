<dialog id="smdialog">
  <div>

    <header>
      <div>
        <h3>New Study-Material</h3>

        <button type="button" title="Close">Close</button>
      </div>
    </header>

    <form id="smf" action="./" method="dialog" enctype="multipart/form-data" spellcheck="true">
      <div>
        <fieldset>
          <div>
            <label>
              <span>Title</span>

              <input type="text" name="title" placeholder="Enter the title" required>
            </label>

            <label>
              <span>Description</span>

              <textarea id="description" name="description" placeholder="Enter the description" required></textarea>
            </label>

            <label>
              <span>Class</span>

              <select name="class" id="class" required>
                <option value="" label="Select"></option>
                <?php foreach ( $classes as $class ) : ?>
                  <option value="<?= $class->id ?>" label="<?= $class->title ?>"></option>
                <?php endforeach; ?>
              </select>
            </label>

            <label>
              <span>Your subject</span>

              <select name="subject" id="subject" required>
                <option value="" label="Select"></option>
                <?php foreach ( $subjects as $subject ) : ?>
                  <option value="<?= $subject->id ?>" label="<?= $subject->title ?>"></option>
                <?php endforeach; ?>
              </select>
            </label>

            <label>
              <span>Your attachment</span>

              <input type="file" name="attachment" id="attachment" required>
            </label>
          </div>
        </fieldset>
      </div>
    </form>

    <footer>
      <div>
        <menu>
          <li><button type="button" form="smf" name="cancel" title="Cancel">Cancel</button></li>
          <li><button type="submit" form="smf" name="submit" title="Submit">Submit</button></li>
        </menu>
      </div>
    </footer>

  </div>
</dialog>