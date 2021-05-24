<p>Sistema desenvolvido por 

<a href='https://github.com/alexzarp'>
<img class='git' src='assets/images/github.svg'
alt='Logo GitHub'>Alex Sandro</a>
e
<a href='https://github.com/Brunadisner'>
<img class='git' src='assets/images/github.svg'
alt='Logo GitHub'>Bruna Gabriela</a>.</p><br>
    
<img src="assets/images/relogio.svg" class="git" alt="Relógio">
<?php
    $socket = fsockopen('udp://pool.ntp.br', 123, $err_no, $err_str, 1);
    if ($socket)
    {
        if (fwrite($socket, chr(bindec('00'.sprintf('%03d', decbin(3)).'011')).str_repeat(chr(0x0), 39).pack('N', time()).pack("N", 0)))
        {
            stream_set_timeout($socket, 1);
            $unpack0 = unpack("N12", fread($socket, 48));
            echo '<strong>';
            echo date('H:i', $unpack0[7]);
            echo '</strong>';
        }
        fclose($socket);    
    }
?>