<div class="container">
    <div class="row">
        <br/>
        <br/>
        <br/>
        <h3> Submit a Feedback</h3>
        <br/>
        <div class="col-md-6">
        <form action="<?php echo base_url(); ?>welcome/send_message" method="post">
            <label> Email:</label><br/>
            <input type="text" name="email" class="form-control">
                <br/>
            <label>Subject:</label><br/>
            <input type="text" name="subject" class="form-control">
                <br/>
                <label>Message:</label><br/>
            <textarea name="message" class="form-control"> </textarea>
                <br/>
            <input type="submit" name="submit" value="Send" class="btn btn-primary"> 
        </form>
        </div>
    </div>
</div>