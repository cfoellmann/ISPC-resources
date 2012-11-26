<?php
//get raw POST data so we can extract the email address
$data = file_get_contents("php://input");
preg_match("/\<EMailAddress\>(.*?)\<\/EMailAddress\>/", $data, $matches);

//set Content-Type
header("Content-Type: application/xml");
?>
<?php echo '<?xml version="1.0" encoding="utf-8" ?>'; ?>

<Autodiscover xmlns="http://schemas.microsoft.com/exchange/autodiscover/responseschema/2006">
    <Response xmlns="http://schemas.microsoft.com/exchange/autodiscover/outlook/responseschema/2006a">
        <Account>
            <AccountType>email</AccountType>
            <Action>settings</Action>
            <Protocol>
                <Type>IMAP</Type>
                <Server>imap.domain.tld</Server>
                <Port>993</Port>
                <DomainRequired>off</DomainRequired>
                <LoginName><?php echo $matches[1]; ?></LoginName>
                <SPA>off</SPA>
                <SSL>on</SSL>
                <AuthRequired>on</AuthRequired>
            </Protocol>
            <Protocol>
                <Type>POP3</Type>
                <Server>pop3.domain.tld</Server>
                <Port>995</Port>
                <DomainRequired>off</DomainRequired>
                <LoginName><?php echo $matches[1]; ?></LoginName>
                <SPA>off</SPA>
                <SSL>on</SSL>
                <AuthRequired>on</AuthRequired>
            </Protocol> 
            <Protocol>
                <Type>SMTP</Type>
                <Server>smtp.domain.tld</Server>
                <Port>25</Port>
                <DomainRequired>off</DomainRequired>
                <LoginName><?php echo $matches[1]; ?></LoginName>
                <SPA>off</SPA>
                <Encryption>TLS</Encryption>
                <AuthRequired>on</AuthRequired>
                <UsePOPAuth>off</UsePOPAuth>
                <SMTPLast>off</SMTPLast>
            </Protocol>
        </Account>
    </Response>
</Autodiscover>