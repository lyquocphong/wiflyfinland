
        <h2 style="margin-top:0px">Question <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="mediumtext">Question <?php echo form_error('question') ?></label>
            <input type="text" class="form-control" name="question" id="question" placeholder="Question" value="<?php echo $question; ?>" />
        </div>
	    <div class="form-group">
            <label for="mediumtext">Answer <?php echo form_error('answer') ?></label>
            <input type="text" class="form-control" name="answer" id="answer" placeholder="Answer" value="<?php echo $answer; ?>" />
        </div>
	    <!-- <div class="form-group">
            <label for="int">Question Type Id <?php echo form_error('question_type_id') ?></label>
            <input type="text" class="form-control" name="question_type_id" id="question_type_id" placeholder="Question Type Id" value="<?php echo $question_type_id; ?>" />
        </div> -->
        <div class="form-group">
            <label for="int">Question Type <?php echo form_error('question_type_id') ?></label>
            <select class="form-control" id="question_type_id" name="question_type_id">
            <?php foreach($question_types as $type): ?>
                <option value="<?php echo $type->id ?>"><?php echo $type->name ?></option>
            <?php endforeach; ?>
            </select>
        </div>
	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('question') ?>" class="btn btn-default">Cancel</a>
	</form>