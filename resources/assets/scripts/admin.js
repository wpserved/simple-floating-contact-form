import "@babel/polyfill";

if (window.NodeList && !NodeList.prototype.forEach) {
  NodeList.prototype.forEach = Array.prototype.forEach;
}

jQuery(function($) {
  jQuery(document).ready(function($){
    // Define a variable uploadIcon
    let uploadIcon;
    let uploadSuccessIcon;

    $('#sfcf-form-icon-btn').click(function(e) {
      e.preventDefault();
      // If the upload object has already been created, reopen the dialog
      if (uploadIcon) {
        uploadIcon.open();
        return;
      }
      // Extend the wp.media object
      uploadIcon = wp.media.frames.file_frame = wp.media({
        title: 'Select media',
        button: {
        text: 'Select media'
      }, multiple: false });

      // When a file is selected, grab the URL and set it as the text field's value
      uploadIcon.on('select', function() {
        var attachment = uploadIcon.state().get('selection').first().toJSON();
        $('#sfcf-form-icon').val(attachment.url);
        $('#sfcf-form-icon-img').attr('src', attachment.url);
      });
      // Open the upload dialog
      uploadIcon.open();
    });

    $('#sfcf-form-icon-clear').click(function(e) {
      e.preventDefault();
      $('#sfcf-form-icon').val('');
      $('#sfcf-form-icon-img').attr('src', '');
    });

    $('#sfcf-success-icon-btn').click(function(e) {
      e.preventDefault();
      // If the upload object has already been created, reopen the dialog
        if (uploadSuccessIcon) {
        uploadSuccessIcon.open();
        return;
      }
      // Extend the wp.media object
      uploadSuccessIcon = wp.media.frames.file_frame = wp.media({
        title: 'Select media',
        button: {
        text: 'Select media'
      }, multiple: false });

      // When a file is selected, grab the URL and set it as the text field's value
      uploadSuccessIcon.on('select', function() {
        var attachment = uploadSuccessIcon.state().get('selection').first().toJSON();
        $('#sfcf-success-icon').val(attachment.url);
        $('#sfcf-success-icon-img').attr('src', attachment.url);
      });
      // Open the upload dialog
      uploadSuccessIcon.open();
    });

    $('#sfcf-success-icon-clear').click(function(e) {
      e.preventDefault();
      $('#sfcf-success-icon').val('');
      $('#sfcf-success-icon-img').attr('src', '');
    });

    $('.sfcf-color').wpColorPicker();

  });
});
