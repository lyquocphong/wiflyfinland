
        <h2 style="margin-top:0px">Question Read</h2>
        <table class="table">
	    <tr><td>Question</td><td><?php echo $question; ?></td></tr>
	    <tr><td>Answer</td><td><?php echo $answer; ?></td></tr>
	    <tr><td>Question Type Id</td><td><?php echo $question_type_id; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('question') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>