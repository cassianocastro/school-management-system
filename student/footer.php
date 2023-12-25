  </div>
  <!-- Main Footer -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2020 <a href="https://technostudy.co.in">School Managment System</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 1.0
    </div>
  </footer>
</div>
<!-- ./wrapper -->

<!--
  1. Bootstrap
  2. overlayScrollbars
  3. AdminLTE App
  4. OPTIONAL SCRIPTS
-->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<script src="../dist/js/adminlte.js"></script>
<script src="../dist/js/demo.js"></script>

<script>
  (function(){
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