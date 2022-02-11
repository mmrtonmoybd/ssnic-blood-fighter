<?= $this->section('pageStyles') ?>
<style>
                  .avatarx {
                  border: 4px solid rgba(255, 255, 255, 0.6);
                  margin-top: -6rem;
                  margin-bottom: 1.4rem;
                  width: 7rem;
                  height: 7rem;
                  }
                  .sidenavlink{
                  text-decoration:none;
                  color:#606975;
                  padding:13px 5px 13px 5px;
                  border:0px;
                  border-bottom:1px solid #DDD;
                  text-align:left;
                  font-size:14px ;
                  width:100%;
                  }
                  .sidenavlink2{
                  text-decoration:none;
                  color:#606975;
                  padding:13px 5px 13px 5px;
                  border:0px;
                  border-bottom:1px solid #DDD;
                  text-align:left;
                  font-size:14px ;
                  width:100%;
                  }
                  .sidenavlink:hover{
                  text-decoration:none;
                  color:#1b1b1b;
                  padding:13px 5px 13px 5px;
                  border:0px;
                  border-bottom:1px solid #DDD;
                  text-align:left;
                  font-size:14px ;
                  width:100%;
                  background-color:#d3dae6;
                  transition:.2s;
                  transform: scale(1.05);
                  }
                  .sidenavlink2:hover{
                  text-decoration:none;
                  color:#1b1b1b;
                  padding:13px 5px 13px 5px;
                  border:0px;
                  border-bottom:1px solid #DDD;
                  text-align:left;
                  font-size:14px ;
                  width:100%;
                  background-color:#d3dae6;
                  transition:.2s;
                  }
                  .sidenavlink:hover::before, .sidenavlink:hover::after, .sidenavlink:focus::before, .sidenavlink:focus::after {
                  transform: scale3d(1, 1, 1);
                  transition:.7s;
                  background-color:red;
                  }
               </style>
<?= $this->endSection() ?> 