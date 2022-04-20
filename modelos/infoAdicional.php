<?php


function mostrarAdicional($categoria, $row) {
    switch ($categoria) {
        case 'motherboard':
            echo '<ul>';
                echo '<li> Socket: ' . $row['socket'] . '</li>';
                echo '<li> Chipset: ' . $row['chipset'] . '</li>';
                echo '<li> Puertos PCIe x16: ' . $row['pciex16'] . '</li>';
                echo '<li> Puertos PCIe x1: ' . $row['pciex1'] . '</li>';
                echo '<li> Puertos SATA: ' . $row['sata'] . '</li>';
                echo '<li> Puertos M2: ' . $row['m2'] . '</li>';
            echo '</ul>';
            break;
        case 'microprocesador':
            echo '<ul>';
                echo '<li> Socket: ' . $row['socket'] . '</li>';
                echo '<li> Velocidad: ' . $row['velocidad'] . '</li>';
                echo '<li> Núcleos Reales: ' . $row['nucleo_r'] . '</li>';
                echo '<li> Núcleos Virtuales: ' . $row['nucleo_v'] . '</li>';
            echo '</ul>';
            break;
        case 'memoria':
            
            break;
        case 'fuente':
            
            break;
        case 'disco':
            
            break;
        case 'gabinete':
            
            break;
        case 'accesorio':
            
            break;
        case 'periferico':
            
            break;
        case 'monitor':
            
            break;
        case 'vga':
            
            break;
    }
}

function editarAdicional($categoria, $row) {
    switch ($categoria) {
        case 'motherboard':
            echo '<label for="socket">Socket</label></br>';
            echo '<input type="text" id="socket" name="socket" value="'.$row['socket'].'"></br>';
            echo '<label for="chipset">Chipset</label></br>';
            echo '<input type="text" id="chipset" name="chipset" value="'.$row['chipset'].'"></br>';
            echo '<label for="pciex16">Puertos PCIe x16</label></br>';
            echo '<input type="text" id="pciex16" name="pciex16" value="'.$row['pciex16'].'"></br>';
            echo '<label for="pciex1">Puertos PCIe x1</label></br>';
            echo '<input type="text" id="pciex1" name="pciex1" value="'.$row['pciex1'].'"></br>';
            echo '<label for="sata">Puertos SATA</label></br>';
            echo '<input type="text" id="sata" name="sata" value="'.$row['sata'].'"></br>';
            echo '<label for="m2">Puertos M2</label></br>';
            echo '<input type="text" id="m2" name="m2" value="'.$row['m2'].'"></br>';
            break;
        case 'microprocesador':
            echo '<label for="socket">Socket</label></br>';
            echo '<input type="text" id="socket" name="socket" value="'.$row['socket'].'"></br>';
            echo '<label for="chipset">Chipset</label></br>';
            echo '<input type="text" id="velocidad" name="velocidad" value="'.$row['velocidad'].'"></br>';
            echo '<label for="pciex16">Puertos PCIe x16</label></br>';
            echo '<input type="text" id="nucleo_r" name="nucleo_r" value="'.$row['nucleo_r'].'"></br>';
            echo '<label for="pciex1">Puertos PCIe x1</label></br>';
            echo '<input type="text" id="nucleo_v" name="nucleo_v" value="'.$row['nucleo_v'].'"></br>';      
            break;
        case 'memoria':
            
            break;
        case 'fuente':
            
            break;
        case 'disco':
            
            break;
        case 'gabinete':
            
            break;
        case 'accesorio':
            
            break;
        case 'periferico':
            
            break;
        case 'monitor':
            
            break;
        case 'vga':
            
            break;
    }
}

function modificarDBAdicional($row) {
    switch ($row['categoria']) {
        case 'motherboard':
            return "UPDATE productos_motherboard SET
            socket='".$row['socket']."',
            chipset='".$row['chipset']."',
            pciex16=".$row['pciex16'].",
            pciex1=".$row['pciex1'].",
            sata=".$row['sata'].",
            m2=".$row['m2']."
            WHERE cod_producto=".$row['prodID'].";";
        case 'microprocesador':
            return "UPDATE productos_motherboard SET
            socket='".$row['socket']."',
            velocidad='".$row['velocidad']."',
            nucleo_r=".$row['nucleo_r'].",
            nucleo_v=".$row['nucleo_v'].",
            sata=".$row['sata'].",
            m2=".$row['m2']."
            WHERE cod_producto=".$row['prodID'].";";
            break;
        case 'memoria':
            
            break;
        case 'fuente':
            
            break;
        case 'disco':
            
            break;
        case 'gabinete':
            
            break;
        case 'accesorio':
            
            break;
        case 'periferico':
            
            break;
        case 'monitor':
            
            break;
        case 'vga':
            
            break;
    }
}