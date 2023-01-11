# File Encoding study

## Part of this subject

1. Les premiers encodages

## Ressources 

- [Tout savoir sur l'encodage (Dimensional Insight)](https://www.difrance.com/informations/tout-savoir-sur-l-encodage#:~:text=Ce%20sont%3A%20auto%2C%20ascii%2C,%2Dbe%2C%20unicode%2Dle.)
- []()
- []()
- []()
- []()

# 1. Les premiers encodages
 
## Le premier octect de 8bits 

### Rappel :

- [**Mot-valise**(traduction de l'anglais « portmanteau word »)](https://fr.wikipedia.org/wiki/Mot-valise) : Mot composé de morceaux non signifiants de deux ou plusieurs mots.
![Exemple avec une "cuichette"](assets/cuichette_example.png)

- [**1 Bits**](https://www.lemagit.fr/definition/Bit) : Mot-valise créé à partir de l'anglais binary digit, soit chiffre binaire, est la plus petite unité de donnée d'un ordinateur. **Un bit a une seule valeur binaire, 0 ou 1.**

- [**Système hexadécimal**]() : Le système hexadécimal est un système de numération positionnel en base 16. Il utilise ainsi 16 symboles, en général les chiffres arabes pour les dix premiers chiffres et les lettres A à F pour les six suivants.

1 Octect de 8bits comportait les lettres de l'alphabet latin et les majuscule.

A a, B b, C c, D d, E e, F f, G g, H h, I i, J j, K k, L l, M m, N n, O o, P p, Q q, R r, S s, T t, U u, V v, W w, X x, Y y, Z z.

### EBCDIC (Extended Binary Coded Decimal Interchange Code) par IBM


<table border="1" cellspacing="0" cellpadding="2" class="wikitable" style="margin:0 2em 0 0">
<caption>Jeu de caractères EBCDIC (variante compatible avec l’UTF-EBCDIC).
</caption>
<tbody><tr align="center">
<th scope="col" rowspan="2">Quartet<br>haut
</th>
<th scope="col" colspan="16">Quartet bas (toutes les valeurs sont en <a href="/wiki/Syst%C3%A8me_hexad%C3%A9cimal" title="Système hexadécimal">hexadécimal</a>)
</th></tr>
<tr align="center">
<th scope="col">...0
</th>
<th scope="col">...1
</th>
<th scope="col">...2
</th>
<th scope="col">...3
</th>
<th scope="col">...4
</th>
<th scope="col">...5
</th>
<th scope="col">...6
</th>
<th scope="col">...7
</th>
<th scope="col">...8
</th>
<th scope="col">...9
</th>
<th scope="col">...A
</th>
<th scope="col">...B
</th>
<th scope="col">...C
</th>
<th scope="col">...D
</th>
<th scope="col">...E
</th>
<th scope="col">...F
</th></tr>
<tr align="center">
<th scope="row">0...
</th>
<td bgcolor="#FFCCCC"><small>NUL</small><br><small>0000</small>
</td>
<td bgcolor="#FFCCCC"><small>SOH</small><br><small>0001</small>
</td>
<td bgcolor="#FFCCCC"><small>STX</small><br><small>0002</small>
</td>
<td bgcolor="#FFCCCC"><small>ETX</small><br><small>0003</small>
</td>
<td bgcolor="#FFCCFF"><small>ST</small><br><small>009C</small>
</td>
<td bgcolor="#FFCCCC"><small>HT</small><br><small>0009</small>
</td>
<td bgcolor="#FFCCFF"><small>SSA</small><br><small>0086</small>
</td>
<td bgcolor="#FFCCCC"><small>DEL</small><br><small>007F</small>
</td>
<td bgcolor="#FFCCFF"><small>EPA</small><br><small>0097</small>
</td>
<td bgcolor="#FFCCFF"><small>RI</small><br><small>008D</small>
</td>
<td bgcolor="#FFCCFF"><small>SS2</small><br><small>008E</small>
</td>
<td bgcolor="#FFCCCC"><small>VT</small><br><small>000B</small>
</td>
<td bgcolor="#FFCCCC"><small>FF</small><br><small>000C</small>
</td>
<td bgcolor="#FFCCCC"><small>CR</small><br><small>000D</small>
</td>
<td bgcolor="#FFCCCC"><small>SO</small><br><small>000E</small>
</td>
<td bgcolor="#FFCCCC"><small>SI</small><br><small>000F</small>
</td></tr>
<tr align="center">
<th scope="row">1...
</th>
<td bgcolor="#FFCCCC"><small>DLE</small><br><small>0010</small>
</td>
<td bgcolor="#FFCCCC"><small>DC1</small><br><small>0011</small>
</td>
<td bgcolor="#FFCCCC"><small>DC2</small><br><small>0012</small>
</td>
<td bgcolor="#FFCCCC"><small>DC3</small><br><small>0013</small>
</td>
<td bgcolor="#FFCCFF"><small>OSC</small><br><small>009D</small>
</td>
<td bgcolor="#FFCCCC"><small>LF</small><br><small>000A</small>
</td>
<td bgcolor="#FFCCCC"><small>BS</small><br><small>0008</small>
</td>
<td bgcolor="#FFCCFF"><small>ESA</small><br><small>0087</small>
</td>
<td bgcolor="#FFCCCC"><small>CAN</small><br><small>0018</small>
</td>
<td bgcolor="#FFCCCC"><small>EM</small><br><small>0019</small>
</td>
<td bgcolor="#FFCCFF"><small>PU2</small><br><small>0092</small>
</td>
<td bgcolor="#FFCCFF"><small>SS3</small><br><small>008F</small>
</td>
<td bgcolor="#FFCCCC"><small>FS</small><br><small>001C</small>
</td>
<td bgcolor="#FFCCCC"><small>GS</small><br><small>001D</small>
</td>
<td bgcolor="#FFCCCC"><small>RS</small><br><small>001E</small>
</td>
<td bgcolor="#FFCCCC"><small>US</small><br><small>001F</small>
</td></tr>
<tr align="center">
<th scope="row">2...
</th>
<td bgcolor="#FFCCFF"><small>PAD</small><br><small>0080</small>
</td>
<td bgcolor="#FFCCFF"><small>HOP</small><br><small>0081</small>
</td>
<td bgcolor="#FFCCFF"><small>BPH</small><br><small>0082</small>
</td>
<td bgcolor="#FFCCFF"><small>NBH</small><br><small>0083</small>
</td>
<td bgcolor="#FFCCFF"><small>IND</small><br><small>0084</small>
</td>
<td bgcolor="#FFCCFF"><small>NEL</small><br><small>0085</small>
</td>
<td bgcolor="#FFCCCC"><small>ETB</small><br><small>0017</small>
</td>
<td bgcolor="#FFCCCC"><small>ESC</small><br><small>001B</small>
</td>
<td bgcolor="#FFCCFF"><small>HTS</small><br><small>0088</small>
</td>
<td bgcolor="#FFCCFF"><small>HTJ</small><br><small>0089</small>
</td>
<td bgcolor="#FFCCFF"><small>VTS</small><br><small>008A</small>
</td>
<td bgcolor="#FFCCFF"><small>PLD</small><br><small>008B</small>
</td>
<td bgcolor="#FFCCFF"><small>PLU</small><br><small>008C</small>
</td>
<td bgcolor="#FFCCCC"><small>ENQ</small><br><small>0005</small>
</td>
<td bgcolor="#FFCCCC"><small>ACK</small><br><small>0006</small>
</td>
<td bgcolor="#FFCCCC"><small>BEL</small><br><small>0007</small>
</td></tr>
<tr align="center">
<th scope="row">3...
</th>
<td bgcolor="#FFCCFF"><small>DCS</small><br><small>0090</small>
</td>
<td bgcolor="#FFCCFF"><small>PU1</small><br><small>0091</small>
</td>
<td bgcolor="#FFCCCC"><small>SYN</small><br><small>0016</small>
</td>
<td bgcolor="#FFCCFF"><small>STS</small><br><small>0093</small>
</td>
<td bgcolor="#FFCCFF"><small>CCH</small><br><small>0094</small>
</td>
<td bgcolor="#FFCCFF"><small>MW</small><br><small>0095</small>
</td>
<td bgcolor="#FFCCFF"><small>SPA</small><br><small>0096</small>
</td>
<td bgcolor="#FFCCCC"><small>EOT</small><br><small>0004</small>
</td>
<td bgcolor="#FFCCFF"><small>SOS</small><br><small>0098</small>
</td>
<td bgcolor="#FFCCFF"><small>SGCI</small><br><small>0099</small>
</td>
<td bgcolor="#FFCCFF"><small>SCI</small><br><small>009A</small>
</td>
<td bgcolor="#FFCCFF"><small>CSI</small><br><small>009B</small>
</td>
<td bgcolor="#FFCCCC"><small>DC4</small><br><small>0014</small>
</td>
<td bgcolor="#FFCCCC"><small>NAK</small><br><small>0015</small>
</td>
<td bgcolor="#FFCCFF"><small>PM</small><br><small>009E</small>
</td>
<td bgcolor="#FFCCCC"><small>SUB</small><br><small>001A</small>
</td></tr>
<tr align="center">
<th scope="row">4...
</th>
<td bgcolor="#FFFFFF"><small>SP</small><br><small>0020</small>
</td>
<td bgcolor="#CCFFCC"><small>NBSP</small><br><small><i>00A0</i></small>
</td>
<td bgcolor="#CCFFCC">¡<br><small><i>00A1</i></small>
</td>
<td bgcolor="#CCFFCC">¢<br><small><i>00A2</i></small>
</td>
<td bgcolor="#CCFFCC">£<br><small><i>00A3</i></small>
</td>
<td bgcolor="#CCFFCC">¤<br><small><i>00A4</i></small>
</td>
<td bgcolor="#CCFFCC">¥<br><small><i>00A5</i></small>
</td>
<td bgcolor="#CCFFCC">¦<br><small><i>00A6</i></small>
</td>
<td bgcolor="#CCFFCC">§<br><small><i>00A7</i></small>
</td>
<td bgcolor="#CCFFCC">¨<br><small><i>00A8</i></small>
</td>
<td bgcolor="#CCFFCC">©<br><small><i>00A9</i></small>
</td>
<td bgcolor="#FFFFFF">.<br><small>002E</small>
</td>
<td bgcolor="#FFFFFF">&lt;<br><small>003C</small>
</td>
<td bgcolor="#FFFFFF">(<br><small>0028</small>
</td>
<td bgcolor="#FFFFFF">+<br><small>002B</small>
</td>
<td bgcolor="#FFFFCC">|<br><small><i>007C</i></small>
</td></tr>
<tr align="center">
<th scope="row">5...
</th>
<td bgcolor="#FFFFFF">&amp;<br><small>0026</small>
</td>
<td bgcolor="#CCFFCC">ª<br><small><i>00AA</i></small>
</td>
<td bgcolor="#CCFFCC">«<br><small><i>00AB</i></small>
</td>
<td bgcolor="#CCFFCC">¬<br><small><i>00AC</i></small>
</td>
<td bgcolor="#CCFFCC"><small>SHY</small><br><small><i>00AD</i></small>
</td>
<td bgcolor="#CCFFCC">®<br><small><i>00AE</i></small>
</td>
<td bgcolor="#CCFFCC">¯<br><small><i>00AF</i></small>
</td>
<td bgcolor="#CCFFCC">°<br><small><i>00B0</i></small>
</td>
<td bgcolor="#CCFFCC">±<br><small><i>00B1</i></small>
</td>
<td bgcolor="#CCFFCC">²<br><small><i>00B2</i></small>
</td>
<td bgcolor="#FFFFCC">!<br><small><i>0021</i></small>
</td>
<td bgcolor="#FFFFCC">$<br><small><i>0024</i></small>
</td>
<td bgcolor="#FFFFFF">*<br><small>002A</small>
</td>
<td bgcolor="#FFFFFF">)<br><small>0029</small>
</td>
<td bgcolor="#FFFFFF">;<br><small>003B</small>
</td>
<td bgcolor="#FFFFCC">^<br><small><i>005E</i></small>
</td></tr>
<tr align="center">
<th scope="row">6...
</th>
<td bgcolor="#FFFFFF">-<br><small>002D</small>
</td>
<td bgcolor="#FFFFFF">/<br><small>002F</small>
</td>
<td bgcolor="#CCFFCC">³<br><small><i>00B3</i></small>
</td>
<td bgcolor="#CCFFCC">´<br><small><i>00B4</i></small>
</td>
<td bgcolor="#CCFFCC">µ<br><small><i>00B5</i></small>
</td>
<td bgcolor="#CCFFCC">¶<br><small><i>00B6</i></small>
</td>
<td bgcolor="#CCFFCC">·<br><small><i>00B7</i></small>
</td>
<td bgcolor="#CCFFCC">¸<br><small><i>00B8</i></small>
</td>
<td bgcolor="#CCFFCC">¹<br><small><i>00B9</i></small>
</td>
<td bgcolor="#CCFFCC">º<br><small><i>00BA</i></small>
</td>
<td bgcolor="#CCFFCC">»<br><small><i>00BB</i></small>
</td>
<td bgcolor="#FFFFFF">,<br><small>002C</small>
</td>
<td bgcolor="#FFFFFF">%<br><small>0025</small>
</td>
<td bgcolor="#FFFFFF">_<br><small>005F</small>
</td>
<td bgcolor="#FFFFFF">&gt;<br><small>003E</small>
</td>
<td bgcolor="#FFFFFF">?<br><small>003F</small>
</td></tr>
<tr align="center">
<th scope="row">7...
</th>
<td bgcolor="#CCFFCC">¼<br><small><i>00BC</i></small>
</td>
<td bgcolor="#CCFFCC">½<br><small><i>00BD</i></small>
</td>
<td bgcolor="#CCFFCC">¾<br><small><i>00BE</i></small>
</td>
<td bgcolor="#CCFFCC">¿<br><small><i>00BF</i></small>
</td>
<td bgcolor="#CCFFCC">À<br><small><i>00C0</i></small>
</td>
<td bgcolor="#CCFFCC">Á<br><small><i>00C1</i></small>
</td>
<td bgcolor="#CCFFCC">Â<br><small><i>00C2</i></small>
</td>
<td bgcolor="#CCFFCC">Ã<br><small><i>00C3</i></small>
</td>
<td bgcolor="#CCFFCC">Ä<br><small><i>00C4</i></small>
</td>
<td bgcolor="#FFFFCC">`<br><small><i>0060</i></small>
</td>
<td bgcolor="#FFFFFF">:<br><small>003A</small>
</td>
<td bgcolor="#FFFFCC">#<br><small><i>0023</i></small>
</td>
<td bgcolor="#FFFFCC">@<br><small><i>0040</i></small>
</td>
<td bgcolor="#FFFFFF">'<br><small>0027</small>
</td>
<td bgcolor="#FFFFFF">=<br><small>003D</small>
</td>
<td bgcolor="#FFFFCC">"<br><small><i>0022</i></small>
</td></tr>
<tr align="center">
<th scope="row">8...
</th>
<td bgcolor="#CCFFCC">Å<br><small><i>00C5</i></small>
</td>
<td bgcolor="#FFFFFF">a<br><small>0061</small>
</td>
<td bgcolor="#FFFFFF">b<br><small>0062</small>
</td>
<td bgcolor="#FFFFFF">c<br><small>0063</small>
</td>
<td bgcolor="#FFFFFF">d<br><small>0064</small>
</td>
<td bgcolor="#FFFFFF">e<br><small>0065</small>
</td>
<td bgcolor="#FFFFFF">f<br><small>0066</small>
</td>
<td bgcolor="#FFFFFF">g<br><small>0067</small>
</td>
<td bgcolor="#FFFFFF">h<br><small>0068</small>
</td>
<td bgcolor="#FFFFFF">i<br><small>0069</small>
</td>
<td bgcolor="#CCFFCC">Æ<br><small><i>00C6</i></small>
</td>
<td bgcolor="#CCFFCC">Ç<br><small><i>00C7</i></small>
</td>
<td bgcolor="#CCFFCC">È<br><small><i>00C8</i></small>
</td>
<td bgcolor="#CCFFCC">É<br><small><i>00C9</i></small>
</td>
<td bgcolor="#CCFFCC">Ê<br><small><i>00CA</i></small>
</td>
<td bgcolor="#CCFFCC">Ë<br><small><i>00CB</i></small>
</td></tr>
<tr align="center">
<th scope="row">9...
</th>
<td bgcolor="#CCFFCC">Ì<br><small><i>00CC</i></small>
</td>
<td bgcolor="#FFFFFF">j<br><small>006A</small>
</td>
<td bgcolor="#FFFFFF">k<br><small>006B</small>
</td>
<td bgcolor="#FFFFFF">l<br><small>006C</small>
</td>
<td bgcolor="#FFFFFF">m<br><small>006D</small>
</td>
<td bgcolor="#FFFFFF">n<br><small>006E</small>
</td>
<td bgcolor="#FFFFFF">o<br><small>006F</small>
</td>
<td bgcolor="#FFFFFF">p<br><small>0070</small>
</td>
<td bgcolor="#FFFFFF">q<br><small>0071</small>
</td>
<td bgcolor="#FFFFFF">r<br><small>0072</small>
</td>
<td bgcolor="#CCFFCC">Í<br><small><i>00CD</i></small>
</td>
<td bgcolor="#CCFFCC">Î<br><small><i>00CE</i></small>
</td>
<td bgcolor="#CCFFCC">Ï<br><small><i>00CF</i></small>
</td>
<td bgcolor="#CCFFCC">Ð<br><small><i>00D0</i></small>
</td>
<td bgcolor="#CCFFCC">Ñ<br><small><i>00D1</i></small>
</td>
<td bgcolor="#CCFFCC">Ò<br><small><i>00D2</i></small>
</td></tr>
<tr align="center">
<th scope="row">A...
</th>
<td bgcolor="#CCFFCC">Ó<br><small><i>00D3</i></small>
</td>
<td bgcolor="#FFFFCC">~<br><small><i>007E</i></small>
</td>
<td bgcolor="#FFFFFF">s<br><small>0073</small>
</td>
<td bgcolor="#FFFFFF">t<br><small>0074</small>
</td>
<td bgcolor="#FFFFFF">u<br><small>0075</small>
</td>
<td bgcolor="#FFFFFF">v<br><small>0076</small>
</td>
<td bgcolor="#FFFFFF">w<br><small>0077</small>
</td>
<td bgcolor="#FFFFFF">x<br><small>0078</small>
</td>
<td bgcolor="#FFFFFF">y<br><small>0079</small>
</td>
<td bgcolor="#FFFFFF">z<br><small>007A</small>
</td>
<td bgcolor="#CCFFCC">Ô<br><small><i>00D4</i></small>
</td>
<td bgcolor="#CCFFCC">Õ<br><small><i>00D5</i></small>
</td>
<td bgcolor="#CCFFCC">Ö<br><small><i>00D6</i></small>
</td>
<td bgcolor="#FFFFCC">[<br><small><i>005B</i></small>
</td>
<td bgcolor="#CCFFCC">×<br><small><i>00D7</i></small>
</td>
<td bgcolor="#CCFFCC">Ø<br><small><i>00D8</i></small>
</td></tr>
<tr align="center">
<th scope="row">B...
</th>
<td bgcolor="#CCFFCC">Ù<br><small><i>00D9</i></small>
</td>
<td bgcolor="#CCFFCC">Ú<br><small><i>00DA</i></small>
</td>
<td bgcolor="#CCFFCC">Û<br><small><i>00DB</i></small>
</td>
<td bgcolor="#CCFFCC">Ü<br><small><i>00DC</i></small>
</td>
<td bgcolor="#CCFFCC">Ý<br><small><i>00DD</i></small>
</td>
<td bgcolor="#CCFFCC">Þ<br><small><i>00DE</i></small>
</td>
<td bgcolor="#CCFFCC">ß<br><small><i>00DF</i></small>
</td>
<td bgcolor="#CCFFCC">à<br><small><i>00E0</i></small>
</td>
<td bgcolor="#CCFFCC">á<br><small><i>00E1</i></small>
</td>
<td bgcolor="#CCFFCC">â<br><small><i>00E2</i></small>
</td>
<td bgcolor="#CCFFCC">ã<br><small><i>00E3</i></small>
</td>
<td bgcolor="#CCFFCC">ä<br><small><i>00E4</i></small>
</td>
<td bgcolor="#CCFFCC">å<br><small><i>00E5</i></small>
</td>
<td bgcolor="#FFFFCC">]<br><small><i>005D</i></small>
</td>
<td bgcolor="#CCFFCC">æ<br><small><i>00E6</i></small>
</td>
<td bgcolor="#CCFFCC">ç<br><small><i>00E7</i></small>
</td></tr>
<tr align="center">
<th scope="row">C...
</th>
<td bgcolor="#FFFFCC">{<br><small><i>007B</i></small>
</td>
<td bgcolor="#FFFFFF">A<br><small>0041</small>
</td>
<td bgcolor="#FFFFFF">B<br><small>0042</small>
</td>
<td bgcolor="#FFFFFF">C<br><small>0043</small>
</td>
<td bgcolor="#FFFFFF">D<br><small>0044</small>
</td>
<td bgcolor="#FFFFFF">E<br><small>0045</small>
</td>
<td bgcolor="#FFFFFF">F<br><small>0046</small>
</td>
<td bgcolor="#FFFFFF">G<br><small>0047</small>
</td>
<td bgcolor="#FFFFFF">H<br><small>0048</small>
</td>
<td bgcolor="#FFFFFF">I<br><small>0049</small>
</td>
<td bgcolor="#CCFFCC">è<br><small><i>00E8</i></small>
</td>
<td bgcolor="#CCFFCC">é<br><small><i>00E9</i></small>
</td>
<td bgcolor="#CCFFCC">ê<br><small><i>00EA</i></small>
</td>
<td bgcolor="#CCFFCC">ë<br><small><i>00EB</i></small>
</td>
<td bgcolor="#CCFFCC">ì<br><small><i>00EC</i></small>
</td>
<td bgcolor="#CCFFCC">í<br><small><i>00ED</i></small>
</td></tr>
<tr align="center">
<th scope="row">D...
</th>
<td bgcolor="#FFFFCC">}<br><small><i>007D</i></small>
</td>
<td bgcolor="#FFFFFF">J<br><small>004A</small>
</td>
<td bgcolor="#FFFFFF">K<br><small>004B</small>
</td>
<td bgcolor="#FFFFFF">L<br><small>004C</small>
</td>
<td bgcolor="#FFFFFF">M<br><small>004D</small>
</td>
<td bgcolor="#FFFFFF">N<br><small>004E</small>
</td>
<td bgcolor="#FFFFFF">O<br><small>004F</small>
</td>
<td bgcolor="#FFFFFF">P<br><small>0050</small>
</td>
<td bgcolor="#FFFFFF">Q<br><small>0051</small>
</td>
<td bgcolor="#FFFFFF">R<br><small>0052</small>
</td>
<td bgcolor="#CCFFCC">î<br><small><i>00EE</i></small>
</td>
<td bgcolor="#CCFFCC">ï<br><small><i>00EF</i></small>
</td>
<td bgcolor="#CCFFCC">ð<br><small><i>00F0</i></small>
</td>
<td bgcolor="#CCFFCC">ñ<br><small><i>00F1</i></small>
</td>
<td bgcolor="#CCFFCC">ò<br><small><i>00F2</i></small>
</td>
<td bgcolor="#CCFFCC">ó<br><small><i>00F3</i></small>
</td></tr>
<tr align="center">
<th scope="row">E...
</th>
<td bgcolor="#FFFFCC">\<br><small><i>005C</i></small>
</td>
<td bgcolor="#CCFFCC">ô<br><small><i>00F4</i></small>
</td>
<td bgcolor="#FFFFFF">S<br><small>0053</small>
</td>
<td bgcolor="#FFFFFF">T<br><small>0054</small>
</td>
<td bgcolor="#FFFFFF">U<br><small>0055</small>
</td>
<td bgcolor="#FFFFFF">V<br><small>0056</small>
</td>
<td bgcolor="#FFFFFF">W<br><small>0057</small>
</td>
<td bgcolor="#FFFFFF">X<br><small>0058</small>
</td>
<td bgcolor="#FFFFFF">Y<br><small>0059</small>
</td>
<td bgcolor="#FFFFFF">Z<br><small>005A</small>
</td>
<td bgcolor="#CCFFCC">õ<br><small><i>00F5</i></small>
</td>
<td bgcolor="#CCFFCC">ö<br><small><i>00F6</i></small>
</td>
<td bgcolor="#CCFFCC">÷<br><small><i>00F7</i></small>
</td>
<td bgcolor="#CCFFCC">ø<br><small><i>00F8</i></small>
</td>
<td bgcolor="#CCFFCC">ù<br><small><i>00F9</i></small>
</td>
<td bgcolor="#CCFFCC">ú<br><small><i>00FA</i></small>
</td></tr>
<tr align="center">
<th scope="row">F...
</th>
<td bgcolor="#FFFFFF">0<br><small>0030</small>
</td>
<td bgcolor="#FFFFFF">1<br><small>0031</small>
</td>
<td bgcolor="#FFFFFF">2<br><small>0032</small>
</td>
<td bgcolor="#FFFFFF">3<br><small>0033</small>
</td>
<td bgcolor="#FFFFFF">4<br><small>0034</small>
</td>
<td bgcolor="#FFFFFF">5<br><small>0035</small>
</td>
<td bgcolor="#FFFFFF">6<br><small>0036</small>
</td>
<td bgcolor="#FFFFFF">7<br><small>0037</small>
</td>
<td bgcolor="#FFFFFF">8<br><small>0038</small>
</td>
<td bgcolor="#FFFFFF">9<br><small>0039</small>
</td>
<td bgcolor="#CCFFCC">û<br><small><i>00FB</i></small>
</td>
<td bgcolor="#CCFFCC">ü<br><small><i>00FC</i></small>
</td>
<td bgcolor="#CCFFCC">ý<br><small><i>00FD</i></small>
</td>
<td bgcolor="#CCFFCC">þ<br><small><i>00FE</i></small>
</td>
<td bgcolor="#CCFFCC">ÿ<br><small><i>00FF</i></small>
</td>
<td bgcolor="#FFCCFF"><small>APC</small><br><small>009F</small>
</td></tr>
<tr>
<td colspan="17" style="line-height:1.1;font-size:smaller">
<p>Notes&nbsp;:
</p>
<ul><li>Les caractères de contrôle de l’EBCDIC sont indiqués sur fond rouge (commandes C0) ou mauve (commandes C1).</li>
<li>Les positions invariantes de l’<span class="nowrap">ISO 646</span> ou de l’<span class="nowrap">ISO 8859</span> sont généralement invariantes dans les versions de l’EBCDIC. Elles sont indiquées en fond blanc.</li>
<li>Les positions variantes de l’EBCDIC indiquent en italique le point de code Unicode correspondant uniquement à cette variante&nbsp;:
<ul><li>Les caractères variants des différentes versions correspondantes de l’<span class="nowrap">ISO 646</span> sont affichés sur fond jaune (le caractère affiché est celui de l’EBCDIC <span class="nowrap">CCSID 500</span> ou de l’ASCII).
<ul><li>Le caractère “<span class="lang-en" lang="en">double quote</span>” U+0022 (codé 0x7F dans la plupart des variantes de l’EBCDIC) n’est pas variant dans les jeux de caractères compatibles <span class="nowrap">ISO 646</span>, mais varie dans la version turque de l’EBCDIC.</li>
<li>Les minuscules latines U+0061 à U+007A (codées 0x81..0x89, 0x91..0x99, 0xA2..0xA9 dans la plupart des variantes de l’EBCDIC) ne sont pas variants dans les jeux de caractères compatibles <span class="nowrap">ISO 646</span>, mais varient dans les versions japonaises (hiragana/katakana) et cyrilliques de l’EBCDIC (qui y codent d’autres lettres nécessaires à ces écritures).</li></ul></li>
<li>Les caractères variants des différentes versions étendues de l’EBCDIC sont affichés sur fond vert (le caractère affiché est celui de l’UTF-EBCDIC interprété comme caractère l’<a href="/wiki/ISO/CEI_8859-1" title="ISO/CEI 8859-1">ISO/CEI 8859-1</a>). Certains caractères étaient différents dans la version initiale de l’EBCDIC qui y plaçait des symboles spéciaux. Les variantes <span class="nowrap">CCSID 037</span> <span class="nowrap">et 500</span> les plus connues de l’EBCDIC y utilisent ainsi une assignation différente pour de tels symboles.</li></ul></li></ul>
</td></tr></tbody></table>

