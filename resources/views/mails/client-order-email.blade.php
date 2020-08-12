<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Your order has been placed</title>
</head>

<body>
  <table width="100%" cellpadding="0" cellspacing="0"
    style="font-family:Arial,Helvetica,sans-serif;font-size:14px;color:#212228;text-align:left;border-collapse:collapse;"
    bgcolor="#fff0c7">
    <tbody>
      <tr>
        <td>&nbsp;&nbsp;</td>
        <td align="center" style="width:600px;max-width:600px;padding-bottom:30px;padding-top: 30px;">
          <table cellpadding="0" cellspacing="0" style="width: 100%;border: 1px solid #3e271d;">
            <tbody>
              <tr>
                <td style="text-align: center;padding-top: 20px;padding-bottom: 20px;">
                  <img src="{{ asset('images/logo.png') }}" alt="SweetestAffair" style="width: 330px;">
                </td>
              </tr>
              <tr>
                <td style="text-align: center;background-color: #3e271d;color: white;font-size: 13px;">
                  <h3 style="margin: 6px 0;">Your order has been placed</h3>
                </td>
              </tr>
              <tr>
                <td style="padding: 10px 15px;">
                  <p style="font-size: 15px;">
                    Hey {{ $order['customer_name'] }},
                    <br>
                    <br>
                    Great choice. You ordered delicious sweets from <strong style="color: #3e271d;">The Sweetest
                      Affair</strong>.
                    <br>
                    <br>
                    Check below for your order details.
                    <br>
                    <br>
                    If you have any questions, feel free to contact us at any time via email at
                    <a style="color: #3e271d;" href="mailto:support@sweetestaffair.com">support@sweetestaffair.com</a>.
                  </p>
                  <table cellpadding="0" cellspacing="0"
                    style="width: 100%;border-top: 1px solid #3e271d;margin-top: 30px;padding-top: 10px;">
                    <tbody>
                      <tr>
                        <td>
                          <h4>{{ $order['delivery_type'] == 'Deliver' ? 'Shipping': 'Personal' }} Information</h4>
                          <p>
                            Name: {{ $order['customer_name'] }}
                            <br>
                            Phone: {{ $order['customer_phone'] }}
                            <br>
                            Email: {{ $order['customer_email'] }}
                            @if($order['delivery_type'] == 'Deliver')
                            <br><br>
                            <strong>Shipping Address</strong>: {{ $order['customer_address'] }}
                            <br>
                            <strong>Zone</strong>: {{ $order['selected_zone'] }}
                            @endif
                          </p>
                          <h4 style="margin-bottom: 5px;">
                            {{ $order['delivery_type'] == 'Deliver' ? 'Delivery': 'Pickup' }} Date/Time</h4>
                          <p style="margin-top: 5px; font-size:12px;">
                            Date: {{ date('d-m-Y', strtotime($order['deliver_date'])) }}
                            <br>
                            Time between: {{ $order['deliver_time'] }}
                          </p>
                          @if(isset($order['customer_message']))
                          <h4 style="margin-bottom: 5px;">Personal Message</h4>
                          <p style="margin-top: 5px; font-size:12px;">
                            {{ $order['customer_message'] }}
                          </p>
                          @endif
                          <h4 style="margin-bottom: 6px;">Order details (Order ID# {{ $order['id'] }})</h4>
                          <table cellpadding="3" cellspacing="0"
                            style="width: 100%;font-weight: 600;background-color: #e4cc89;padding: 10px;font-size: 12px;">
                            <tbody>
                              <tr style="text-transform: uppercase;">
                                <td width="5%">{{ $order['qty'] }} X</td>
                                <td>{{ $prd['title'] }}</td>
                                <td align="right" width="10%">{{ isset($prd['base_price']) ? $prd['base_price']: '' }}
                                </td>
                              </tr>
                              @foreach (json_decode($order['product_options']) as $opt)
                              <tr>
                                <td></td>
                                @if($opt->label == "Personalized Message" || $opt->label == "Type alphabet")
                                <td style="padding-right: 20px;">{{ $opt->label }}: {{ $opt->key }}</td>
                                @else
                                <td style="padding-right: 20px;">{{ $opt->label }}</td>
                                @endif
                                <td align="right">RS.{{ $opt->price }}</td>
                              </tr>
                              @endforeach

                              <tr>
                                <td colspan="3">
                                  <hr style="border: .4px solid #b9a468;">
                                </td>
                              </tr>
                              <tr>
                                <td colspan="2">Subtotal</td>
                                <td align="right">
                                  RS.{{ number_format((float)$order['base_price']*$order['qty'], 2, '.', '') }}</td>
                              </tr>

                              <tr>
                                <td colspan="2">Online Charges</td>
                                <td align="right">RS.{{ number_format((float)$order['online_charges'], 2, '.', '') }}
                                </td>
                              </tr>
                              
                              @if($order['delivery_type'] == 'Deliver')
                              <tr>
                                <td colspan="2">Incl. delivery fee</td>
                                <td align="right">RS.{{ number_format((float)$order['delivery_charges'], 2, '.', '') }}
                                </td>
                              </tr>
                              @endif
                              <tr>
                                <td colspan="3">
                                  <hr style="border: .4px solid #b9a468;">
                                </td>
                              </tr>
                              <tr>
                                <td colspan="2">Total</td>
                                <td align="right">RS.{{ number_format((float)$order['total_price'], 2, '.', '') }}</td>
                              </tr>
                            </tbody>
                          </table>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </td>
              </tr>
            </tbody>
          </table>
          <table cellpadding="0" cellspacing="0" width="100%" style="border: 1px solid #3e271d;margin-top: 15px;">
            <tbody>
              <tr>
                <td align="left" style="padding-top:14px;padding-bottom:10px">

                  <table cellpadding="0" cellspacing="0" width="100%" style="border-collapse:collapse">
                    <tbody>
                      <tr>
                        <td valign="middle" align="center">

                          <table cellpadding="0" cellspacing="0"
                            style="font-family:Arial,Helvetica,sans-serif;font-size:10px;color:#555555;line-height:1.4em!important;border-collapse:collapse">
                            <tbody>
                              <tr>
                                <td align="center">
                                  <a href="#" style="color:#555555;text-decoration:none!important">22C, Tauheed
                                    Commercial, street
                                    26, DHA, Karachi, Pakistan</a><br>
                                  <span style="color: #3e271d;font-weight: 600;">© {{ date('yy') }}
                                    SweetestAffair</span>&nbsp;&nbsp;&nbsp;&nbsp;<a
                                    style="color:#555555;text-decoration:none"></a>
                                </td>
                              </tr>
                            </tbody>
                          </table>

                        </td>
                        <td width="5%">&nbsp;</td>

                      </tr>
                    </tbody>
                  </table>

                </td>
              </tr>
            </tbody>
          </table>
        </td>
        <td>&nbsp;&nbsp;</td>
      </tr>
    </tbody>
  </table>

</body>

</html>