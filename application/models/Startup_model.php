<?php
class Startup_model extends CI_model {

    function question($q) {
        switch($q) {
            case 1:
                return 'Have you considered a suitable location for your business?';
                break;
            case 2:
                return 'Have you looked in to local rents? These are a good indicator of business costs for the area.';
                break;
            case 3:
                return 'Do you know what ANZSIC industry code you fall in to, or more importantly, the size of the market for that industry?';
                break;
            case 4:
                return 'How many people will you be competing with in this industry?';
                break;
            case 5:
                return 'Is your domain knowledge enough to launch a business, or do you think you may need some help with any aspects of business?';
                break;
            case 5:
                return 'Have you contacted any of your local community business groups that are focussed on new business startups?';
                break;
            case 6:
                return 'Have you considered a employment conditions and talent in the area?';
                break;
            case 7:
                return 'Do you know what the cost of employment is in your given industry and locality?';
                break;
            case 8:
                return 'How long do you plan to be in the startup phase before moving to the launch phase?';
                break;
            case 9:
                return 'Is anyone else working on the problem you are trying to solve?';
                break;
            case 10:
                return 'Will you run in to patent or copyright restrictions; have you searched through IP Australia?';
                break;
            case 11:
                return 'Are you planning on staying local if it takes off; have you considered the tax implication by remaining in Australia?';
                break;
            case 12:
                return 'How many people are you planning to employ in the next three (3) years?';
                break;
            case 13:
                return 'You are going to need a business name. Have you check with ASIC to see if your chosen name is available?';
                break;
            case 14:
                return 'Have you spoken to a lawyer or accountant about starting a company?';
                break;
            case 15:
                return 'Do you understand the legal liabilities of trading as a company, and your obligations as a director?';
                break;
            case 16:
                return 'Have you planned out your ownership structure to allow for an exit at some stage, or a share issue if you need more capital?';
                break;
            case 17:
                return 'If you are comfortable with the legal side of things, have you looked ad online lodgement to help guide you?';
                break;
            case 18:
                return 'Are you "digitally ready" to go in to business?';
                break;
            case 19:
                return 'Do you understand the roles of industry accellarators, incubators and mentor programs?';
                break;
            case 20:
                return 'Are you aware of any programs in your area that are there to help you succeed?';
                break;
            case 21:
                return 'Have you applied for any seed/grant funding through any government initiatives?';
                break;
            default:
                return false;
        }
    }    

    
    function qanswers($q,$url) {
        switch($q) {
            case 2:
                $links[] = array(1,3,'/chart/rent#visual','fa-thumbs-down');
                $links[] = array(1,3,'/chart/rent#visual','fa-question-circle');
                $links[] = array(1,3,'/chart/rent#visual','fa-thumbs-up');
                break;
            case 21:
                $links[] = array(1,21,'/fusion/funding#visual','fa-thumbs-down');
                $links[] = array(1,21,'/fusion/funding#visual','fa-question-circle');
                $links[] = array(1,21,'/fusion/funding#visual','fa-thumbs-up');
                break;
            default:
                $links[] = array(1,($q+1),'','fa-thumbs-down');
                $links[] = array(1,($q+1),'','fa-question-circle');
                $links[] = array(1,($q+1),'','fa-thumbs-up');
        }
        $data = [
                    '<a href="'.$url['scheme']. '://'.$url['host'].'/startup/step/'.$links[0][0].'/'.$links[0][1].$links[0][2].'"><i class="fa '.$links[0][3].' fa-3x"></i></a>',
                    '<a href="'.$url['scheme']. '://'.$url['host'].'/startup/step/'.$links[1][0].'/'.$links[1][1].$links[1][2].'"><i class="fa '.$links[1][3].' fa-3x"></i></a>',
                    '<a href="'.$url['scheme']. '://'.$url['host'].'/startup/step/'.$links[2][0].'/'.$links[2][1].$links[2][2].'"><i class="fa '.$links[2][3].' fa-3x"></i></a>',
                ];
        return $data;
    }

    
    function answer($q) {
        switch($q) {
            case 1:
                return 'Well that was just an easy one to start with';
                break;
            case 21:
                return 'Have a look at this map. This shows where and how much funding is going in to startups from the goverment.';
                break;
            default:
                return 'Have you considered this relevant data?';
        }
    }
}
?>
  