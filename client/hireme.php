<?php include 'header.php' ?>

<div class="container mt-5 mb-5 " id = "hireme">
    <div class="card px-1 py-4">
        <div class="card-body">
            <div class="mb-3">
                <h6 class="card-title mb-3">This appointment is for <?php echo $name ?></h6>
            </div>
            <hr>

            <form action="hiremecore.php" method="post">
                <div class="mb-3">
                    <label for="fromdate" class="form-label">From</label>
                    <input type="date" name="fromdate" class="form-control" id="fromdate" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <div class="form-group">
                        <label for="details" class="form-label">Details</label>
                        <textarea name="details" required class="form-control rounded-0" id="details" rows="3"></textarea>
                    </div>
                </div>

                <div class="">
                    <label required for="transaction" class="form-label">Transaction id(Bkash)</label>
                    <input type="text" id="transaction" class="form-control" name="transaction">
                </div>

                <div class="form-group">
                    <div class="col-md-10">

                        <div class="col-md-8">
                            <a class="toggle-modal text-warning" onclick=" OpenPopupCenter('paymentinstruction.php?id=<?php echo $_GET['id'] ?>','Payment Instruction','600','600')"><b>Payment Instruction<sup class="text-danger">*</sup></b></a>
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <input hidden type="text" name="id" class="form-control" value="<?php echo $_GET['id'] ?>">
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
<script language="javascript" type="text/javascript">
    function OpenPopupCenter(pageURL, title, w, h) {
        var left = (screen.width - w) / 2;
        var top = (screen.height - h) / 4; // for 25% - devide by 4  |  for 33% - devide by 3
        var targetWin = window.open(pageURL, title, 'toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no, width=' + w + ', height=' + h + ', top=' + top + ', left=' + left);
    }
</script>

<?php include 'footer.php' ?>