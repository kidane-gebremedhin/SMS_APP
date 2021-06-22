  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 1.0
    </div>
    <?php $logo=App\Logo::orderBy('id', 'desc')->first(); ?>
    <strong>Copyright &copy; {{date('Y')}} <a href="https://www.pilasatech.com">{{$logo!=null? $logo->logoText :' EDMS'}}</a>.</strong> {{App\Global_var::getLangString('All_Rights_Reserved', $language_strings)}}
  </footer>
