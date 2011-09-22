$(document).ready(function()
{
  // Register event handler
  $('#submit').click(submitButton);
});

function submitButton()
{
	var userName = $('#userName').val();
	userName = jQuery.trim(userName);
	
	if (userName === '')
	{
		alert('Bitte einen Benutzernamen eingeben!');
		return;
	}

	$.getJSON('requester.php', { service: 'BasicAccess', method: 'addUser', userName: userName }, function(data)
	{
		$('#ajaxResultContainer').html(data);
	});
}