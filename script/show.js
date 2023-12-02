$("#imgContrasena").click(function () {

    var control = $(this);
    var estatus = control.data('activo');
    
    var icon = control.find('span');
    if (estatus == false) {
    
      control.data('activo', true);
      $(icon).removeClass('glyphicon-eye-open').addClass('glyphicon-eye-close');
      $("#txtPassword").attr('type', 'text');
    }
    else {
    
      control.data('activo', false);
      $(icon).removeClass('glyphicon-eye-close').addClass('glyphicon-eye-open');
      $("#txtPassword").attr('type', 'password');
    }
  });