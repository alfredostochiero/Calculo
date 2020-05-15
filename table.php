<table class="table table-striped">
	 <thead>
      <tr>
        <th>Descrição</th>
        <th><?=$resultado['tipo'];?></th>
      </tr>
	</thead>
    <tbody>
      <tr>
        <td>Valor consultado</td>
        <td><?=($valor)?'R$ '.number_format($valor,2,",","."):'----' ?></td>
      </tr>
      <?php if($resultado['Tabela']): ?>
	      <tr>
	        <td>Tabela</td>
	        <td><?=$resultado['Tabela']; ?></td>
	      </tr>
  	  <?php endif; ?>
      <tr>
        <td>Valor Oficial</td>
        <td><?='R$ '.number_format($resultado['base'],2,",",".");  ?> </td>
      </tr>
      <tr>
        <td>Distribuidor</td>
        <td><?='R$ '.number_format($resultado['distribuidor'],2,",",".");  ?> </td>
      </tr>

      <tr>
        <td>ISS</td>
        <td><?='R$ '.number_format($resultado['ISS'],2,",",".");  ?> </td>
      </tr>
      <tr>
        <td> Fundo Especial do TJ/RJ </td>
        <td><?='R$ '.number_format($resultado['FunEsp_TJ'],2,",",".");  ?> </td>
      </tr>
      <tr>
        <td> Fundo Especial da Defensoria Pública</td>
        <td><?='R$ '.number_format($resultado['FunEsp_DefPub'],2,",",".");  ?> </td>
      </tr>
      <tr>
        <td>  Fundo Especial da Procuradoria do Estado do Rio de Janeiro </td>
        <td><?='R$ '.number_format($resultado['FundEsp_ProRJ'],2,",",".");  ?> </td>
      </tr>
       <tr>
        <td>   Fundo de Apoio aos Registradores das Pessoas Naturais </td>
        <td><?='R$ '.number_format($resultado['FundAp_PNat'],2,",",".");  ?> </td>
      </tr>
      <tr>
        <td>Total</td>
        <td><?='R$ '.number_format($resultado['resultado'],2,",","."); ?></td>
      </tr>
    </tbody>
</table>