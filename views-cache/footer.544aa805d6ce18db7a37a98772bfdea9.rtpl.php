<?php if(!class_exists('Rain\Tpl')){exit;}?>  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      VP Eventos
    </div>
    <strong>Copyright &copy; 2016 <a href="#">Company</a>.</strong> All rights reserved.
  </footer>

  <aside class="control-sidebar control-sidebar-dark">
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li class="active"><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
      <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
    <div class="tab-content">
      <div class="tab-pane active" id="control-sidebar-home-tab">
        <h3 class="control-sidebar-heading">Recent Activity</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:;">
              <i class="menu-icon fa fa-birthday-cake bg-red"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                <p>Will be 23 on April 24th</p>
              </div>
            </a>
          </li>
        </ul>

        <h3 class="control-sidebar-heading">Tasks Progress</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:;">
              <h4 class="control-sidebar-subheading">
                Custom Template Design
                <span class="pull-right-container">
                  <span class="label label-danger pull-right">70%</span>
                </span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
              </div>
            </a>
          </li>
        </ul>

      </div>
      <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
      <div class="tab-pane" id="control-sidebar-settings-tab">
        <form method="post">
          <h3 class="control-sidebar-heading">General Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Report panel usage
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Some information about this general settings option
            </p>
          </div>
        </form>
      </div>
    </div>
  </aside>
  <div class="control-sidebar-bg"></div>
</div>

<script src="/res/admin/plugins/jQuery/jquery.validate.min.js"></script>
<script src="/res/admin/plugins/jQuery/additional-methods.min.js"></script>
<script src="/res/admin/plugins/jQuery/jquery-2.2.3.min.js"></script>
<script src="/res/admin/bootstrap/js/bootstrap.min.js"></script>
<script src="/res/admin/dist/js/app.min.js"></script>
<script src="/res/admin/plugins/jQuery/jquery.validate.min.js"></script>  
<script src="/res/admin/plugins/jQuery/localization/messages_pt_BR.js"></script>  

<script type="text/javascript">
  $(document).ready(function() {
    $("#formUser").validate({
      rules:{
        name:{                  
          required: true
        },
        password:{                  
          required: true
        }
      }         
    }),
    $("#formCategory").validate({
      rules:{
        name:{                  
          required: true
        }
      }         
    }),
    $("#formProduct").validate({
      rules:{
        name:{                  
          required: true
        },
        price:{                  
          required: true
        }
      }         
    })
  })
</script>

</body>
</html>