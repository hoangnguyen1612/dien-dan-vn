<form method="post" action="http://www.sitesplat.com/demo/phpBB3/ucp.php?mode=login">
              <div class="well">
                <fieldset>
                  <div class="span12">
                    <div class="span6">
                      <label for="username" class="control-label">Username:</label>
                      <div class="input-icon left"> <i class="icon-user"></i>
                        <input class="span8" type="text" name="username" id="username" placeholder="Username">
                      </div>
                      <label for="password" class="control-label">Password:</label>
                      <div class="input-icon left"> <i class="icon-key"></i>
                        <input class="span8" type="password" name="password" id="password" placeholder="Password">
                      </div>
                      <div class="controls controls-row">
                        <div class="radio">
                          <input type="checkbox" name="autologin" id="autologin">
                          <label for="autologin">Log me on automatically each visit</label>
                        </div>
                      </div>
                      <button type="submit" class="btn start" id="load" name="login" value="Login" data-loading-text="Logging-in... &lt;i class=&#39;icon-spin icon-spinner icon-large icon-white&#39;&gt;&lt;/i&gt;">Login</button>
                      <input type="hidden" name="redirect" value="./index.php?">
                    </div>
                    <div class="pull-right hidden-phone">
                      <div class="admin-header-head">
                        <div class="user-fxicon"> <i class="icon-moon-enter"></i> </div>
                      </div>
                    </div>
                  </div>
                </fieldset>
              </div>
            </form>