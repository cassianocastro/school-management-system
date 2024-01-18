<?php
$student = new class("Cassiano Castro", "example@example.com")
{
  public $name;
  public $email;

  public function __construct(string $name, string $email)
  {
    $this->name = $name;
    $this->email = $email;
  }
};
?>

<link rel="stylesheet" href="/plugins/fontawesome-free/css/all.min.css">
<link rel="stylesheet" href="/assets/css/reset.css">
<link rel="stylesheet" href="./index.css">

<dialog id="paynow-popup" open>
  <div>

    <header>
      <div>
        <h5>Paynow</h5>

        <button type="button" title="Close">close</button>
      </div>
    </header>

    <form id="pf" action="./" method="dialog">
      <div>
        <fieldset>
          <div>
            <input type="hidden" name="amount" value="500" readonly>

            <label>
              <span>Name</span>

              <input type="text" name="firstname" value="<?= $student->name ?>" readonly>
            </label>

            <label>
              <span>Email</span>

              <input type="email" name="email" value="<?= $student->email ?>" readonly>
            </label>

            <label>
              <span>Phone</span>

              <input type="tel" name="phone" value="1234567890" readonly>
            </label>

            <label>
              <span>Month</span>

              <input type="month" name="month" id="month" value="" readonly>
            </label>
          </div>
        </fieldset>
      </div>
    </form>

    <footer>
      <div>
        <div>
          <label form="pf">
            <span class="fa fa-rupee-sign"></span>

            <input type="text" name="" size="10" value="500.00" readonly>
          </label>
        </div>

        <button type="submit" title="Confirm & Pay" form="pf" name="form_submitted">
          Pay
        </button>
      </div>
    </footer>

  </div>
</dialog>