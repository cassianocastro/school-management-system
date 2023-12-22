  </div>
  <!-- Main Footer -->
  <footer class="main-footer">
    <strong>
      Copyright &copy; 2020
      <a rel="external" type="text/html" hreflang="en" href="https://technostudy.co.in">
        School Managment System
      </a>
      .
    </strong>

    All rights reserved.

    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 1.0
    </div>
  </footer>
</div>
<!-- ./wrapper -->

<!--
  1. jQuery
  2. Bootstrap
  3. overlayScrollbars
  4. AdminLTE App
  5. OPTIONAL SCRIPTS
-->
<script defer src="../plugins/jquery/jquery.min.js"></script>
<script defer src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script defer src="../plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<script defer src="../dist/js/adminlte.js"></script>
<script defer src="../dist/js/demo.js"></script>
<script>
  (function () {
    var path = window.location.href;

    // console.log(path);

    $(".nav-link").each(function () {

      var href = $(this).attr('href');
      // console.log(href);

      if ( path === decodeURIComponent(href) )
      {
        $(this).addClass('active');

        var parent = $(this).closest('.has-treeview');

        parent.addClass('menu-open');

        $(parent).find('.nav-link').first().addClass('active');

        // console.log(parent);
      }
    });
  }());
</script>
</body>
</html>