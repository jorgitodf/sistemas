
<aside class="row-fluid container container-fechar-compra col-md-12 col-lg-12 col-sm-10 col-xs-10">
    <form method="POST" id="form" onsubmit="return pagar()">
        <fieldset>
            <h3><legend>Resumo da compra</legend></h3>
            Total a pagar: R$ <?php echo number_format($total, 2, ',', '.'); ?>
        </fieldset>
        <br/>
        <fieldset>
            <legend>Informações de Pagamento</legend>
            <select name="pg_form" id="pg_form" onchange="selectPg()">
                <option value=""></option>
                <option value="CREDIT_CARD">Cartão de Crédito</option>
                <option value="BOLETO">Boleto</option>
                <option value="BALANCE">Saldo Pagseguro</option>
            </select>
            <br/>
            <div id="cc" style="display:none">
                Qual a bandeira do seu cartão?<br/>
                <div id="bandeiras"></div>
                <br/>
                <div id="cardinfo" style="display:none">
                    Parcelamento:<br/>
                    <select name="parc" id="parc"></select><br/><br/>

                    Titular do cartão:<br/>
                    <input type="text" name="c_titular" /><br/><br/>

                    CPF do Titular:<br/>
                    <input type="text" name="c_cpf" /><br/><br/>

                    Número do cartão:<br/>
                    <input type="text" name="cartao" id="cartao" /><br/><br/>

                    Digito:<br/>
                    <input type="text" name="digito" id="cvv" maxlength="4" /><br/><br/>

                    Validade:<br/>
                    <input type="text" name="validade" id="validade" />

                </div>
            </div>
        </fieldset>
        <br/>
        <input type="submit" value="Efetuar Pagamento" />
        <input type="hidden" name="bandeira" id="bandeira" />
        <input type="hidden" name="ctoken" id="ctoken" />
        <input type="hidden" name="shash" id="shash" />
        <input type="hidden" name="sessionId" value="<?php echo $sessionId; ?>" />
    </form>

    <script type="text/javascript" src=
    "https://stc.sandbox.pagseguro.uol.com.br/pagseguro/api/v2/checkout/pagseguro.directpayment.js">
    </script>
    <script type="text/javascript">
        var sessionId = '<?php echo $sessionId; ?>';
        var valor = '<?php echo $total; ?>';
        var formOk = false;
    </script>
    <script type="text/javascript" src="/assets/js/ckt.js"></script>
</aside>