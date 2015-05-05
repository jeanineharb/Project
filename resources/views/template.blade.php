
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">

</head>
<body>
		
<?php

use App\Template;

$temp = Template::find(1)->pluck('html');

echo $temp;
?>

<script src="{{ asset('/ckeditor/ckeditor.js') }}"></script>
<script src="{{ asset('/ckeditor/inlineEditorWithCustomButton.js') }}"></script>
					

</body>
</html>