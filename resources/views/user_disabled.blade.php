
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
User Deactivated. Redirecting to home page after 5 seconds

<script type="text/javascript">
	setTimeout(function () {
		   window.location.href= "{{ url('/') }}"; // the redirect goes here

		},5000); // 5 seconds

</script>
</body>
</html>