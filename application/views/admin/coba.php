<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Form horizontal</title>

 <link rel="stylesheet" href="<?php echo base_url()?>assets/css/bootstrap.min.css">
    
    <!-- amchart css -->
    


  </head>
  <body>
    
    <div class="container">
<br/>

        
          
                    <div class="col-md-8">
                              <div class="row">
                        <div class="col-md-2">
                <label for="nama" class="col-xs-2">Nama</label>
            </div>
                <div class="col-md-5">
                    <input type="text" name="nama" class="form-control" placeholder="Nama anda" />
                </div>
            </div>
            </div>

            <div class="form-group">
                <label for="email"  class="col-xs-2">Email</label>
                <div class="col-xs-10">
                    <input type="text" name="email" class="form-control" placeholder="Email anda" />
                </div>
            </div>

            <div class="form-group">
                <label for="telpon"  class="col-xs-2">Telpon</label>
                <div class="col-xs-10">
                    <input type="text" name="telpon" class="form-control" placeholder="No Tlp anda" />
                </div>
            </div>

            <div class="form-group">
                <label for="pesan"  class="col-xs-2">Pesan</label>
                <div class="col-xs-10">
                    <textarea name="pesan" class="form-control"></textarea>
                </div>
            </div>
            <div  class="col-xs-10 col-xs-offset-2">
                <button type="submit" class="btn btn-primary">Kirim</button>
                <button type="reset" class="btn btn-default">Reset</button>
            </div>
        </form>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/bootstrap.min.js"></script>
  </body>
</html>