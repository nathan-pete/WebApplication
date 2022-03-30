<video id="video" autoplay="true"></video>
<script>
	let video=document.getElementById('video');
	if(navigator.mediaDevices.getUserMedia) {
		navigator.mediaDevices.getUserMedia({video:true})
			.then(function(s) {
				video.srcobject=s;
			})
		    .catch(function(err) {
		    	console.log(err);

		    });
		
    }else {
    	console.log('No');

    }
   



</script>






