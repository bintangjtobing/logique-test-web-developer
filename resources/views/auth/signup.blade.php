<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Sign up</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Bintang">
    <link rel="stylesheet"
        href="{!!asset('authentication/fonts/material-design-iconic-font/css/material-design-iconic-font.css')!!}">
    <link rel="stylesheet" href="{!!asset('authentication/css/style.css')!!}">
</head>

<body>
    <div class="wrapper">
        <form action="/register" method="POST" id="wizard">
            {{ csrf_field() }}
            <!-- SECTION 1 -->
            <h2></h2>
            <section>
                @if(session('sukses'))
                <div class="alert-success" role="alert">
                    {{session('sukses')}}
                </div>
                @endif
                <div class="inner">
                    <div class="image-holder">
                        <img src="{!!asset('authentication/images/form-wizard-1.jpg')!!}" alt="">
                    </div>
                    <div class="form-content">
                        <div class="form-header">
                            <h3>Registration</h3>
                        </div>
                        <div class="form-row">
                            <div class="form-holder">
                                <input type="text" name="firstName" placeholder="First Name" class="form-control">
                            </div>
                            <div class="form-holder">
                                <input type="text" name="lastName" placeholder="Last Name" class="form-control">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-holdersingle">
                                <input type="email" name="email" placeholder="Your Email" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-holder">
                                <input type="password" id="password" name="password" placeholder="Password"
                                    class="form-control" required>
                            </div>
                            <div class="form-holder">
                                <input type="password" id="verifyPassword" name="verifyPassword"
                                    placeholder="Verify Password" class="form-control" required>
                                <span id="resultPassword"></span>
                            </div>
                        </div>
                        <div class="checkbox-circle">
                            <label>
                                <input type="checkbox" checked> Check the term and condition.
                                <span class="checkmark"></span>
                            </label>
                        </div>
                        <div class="form-row">
                            <label>
                                Have an account? Please <a href="/">Login</a> here.
                            </label>
                        </div>
                    </div>
                </div>
            </section>
            <!-- SECTION 2 -->
            <h2></h2>
            <section>
                <div class="inner">
                    <div class="image-holder">
                        <img src="{!!asset('authentication/images/form-wizard-2.jpg')!!}" alt="">
                    </div>
                    <div class="form-content">
                        <div class="form-header">
                            <h3>Registration</h3>
                        </div>
                        <p>Please fill with additional info</p>
                        <div class="form-row">
                            <div class="form-holder w-100">
                                <input type="text" name="address" placeholder="Address" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-holder">
                                <input type="date" name="birth" placeholder="Date of Birth" class="form-control"
                                    required>
                            </div>
                            <div class="form-holder">
                                <select name="membership" required class="form-control">
                                    <option>Membership type:</option>
                                    <option value="Silver">Silver</option>
                                    <option value="Gold">Gold</option>
                                    <option value="Platinum">Platinum</option>
                                    <option value="Black">Black</option>
                                    <option value="VIP">VIP</option>
                                    <option value="VVIP">VVIP</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-holdersingle">
                                <input type="number" id="creditCard" name="creditCard" placeholder="Credit Card Number"
                                    class="form-control" required>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </form>

    </div>
    <!-- JQUERY -->
    <script src="{!!asset('authentication/js/jquery-3.3.1.min.js')!!}"></script>
    <script src="{!!asset('authentication/js/jquery.steps.js')!!}"></script>
    <script src="{!!asset('authentication/js/main.js')!!}"></script>

    <script type="text/javascript">
        function checkPasswordMatch() {
            var password = $('#password').val();
            var verifyPassword = $('#verifyPassword').val();
            if (password != verifyPassword)
                $('#resultPassword').html('Password do not match!');
            else
                $('#resultPassword').html('Password match!');
        }
        $(document).ready(function () {
            $("#verifyPassword").keyup(checkPasswordMatch);
        })

    </script>
    <script>
        function check_cc($cc, $extra_check = false) {
            $cards = array(
                "visa" => "(4\d{12}(?:\d{3})?)",
                "amex" => "(3[47]\d{13})",
                "jcb" => "(35[2-8][89]\d\d\d{10})",
                "maestro" => "((?:5020|5038|6304|6579|6761)\d{12}(?:\d\d)?)",
                "solo" => "((?:6334|6767)\d{12}(?:\d\d)?\d?)",
                "mastercard" => "(5[1-5]\d{14})",
                "switch" => "(?:(?:(?:4903|4905|4911|4936|6333|6759)\d{12})|(?:(?:564182|633110)\d{10})(\d\d)?\d?)",
            );
            $names = array("Visa", "American Express", "JCB", "Maestro", "Solo", "Mastercard", "Switch");
            $matches = array();
            $pattern = "#^(?:".implode("|", $cards).
            ")$#";
            $result = preg_match($pattern, str_replace(" ", "", $cc), $matches);
            if ($extra_check && $result > 0) {
                $result = (validatecard($cc)) ? 1 : 0;
            }
            return ($result > 0) ? $names[sizeof($matches) - 2] : false;
        }
        $(document).ready(function () {
            $("#creditCard").keyup(check_cc);
        })

    </script>
</body>

</html>
