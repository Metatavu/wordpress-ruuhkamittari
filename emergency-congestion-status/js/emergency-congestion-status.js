jQuery(document).ready(($) => {
  $(document).on('click', '#saveEmergencyCongestionStatus', () => {
    const status = $('#emergencyCongestionStatus').val();
    $.post(ruuhkamittari.ajaxurl, {
      'action': 'update_emergency_congestion_status',
      'data': { status: status }
    }, () => {
    })
    .fail((response) => {
      alert(response.responseText || response.statusText || 'Unknown error occurred');
    });
  });
});