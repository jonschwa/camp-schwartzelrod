<?php namespace App\Http\Controllers;

use Illuminate\Routing\Controller;

class PageController extends Controller
{
    protected $ourStoryContent;
    protected $weddingInfoContent;
    protected $lodgingContent;
    protected $faqContent;
    protected $thingsToDoContent;

    public function __construct()
    {
        $this->ourStoryContent = [
            [
                'body' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras velit dolor, tincidunt lobortis
                           fringilla eu, consectetur et ipsum. In finibus condimentum posuere. Ut auctor facilisis sapien,
                           tempor porta nulla euismod ut. Nunc pharetra hendrerit nisl, sed fringilla turpis accumsan et.
                           Integer eu blandit enim. Mauris laoreet ultrices neque nec condimentum. Ut aliquam purus id leo
                           placerat lacinia. Nam auctor, est eu elementum gravida, tortor arcu laoreet massa, eu sagittis
                           est erat sed nisi. Vestibulum ullamcorper ultrices sapien quis tincidunt.',
                'img'  => 'https://placehold.it/200x200'
            ],
            [
                'body' => 'Etiam tristique orci quis enim blandit porta. Suspendisse sem purus, pharetra quis elit eu,
                           laoreet tristique diam. Interdum et malesuada fames ac ante ipsum primis in faucibus. Duis
                           sollicitudin enim dolor, a varius nisl pellentesque eu. Etiam fermentum volutpat nunc vel luctus.
                           Ut in enim vitae augue fringilla congue vitae sit amet est. Maecenas eleifend, nisi vitae
                           elementum viverra, ex augue porttitor ipsum, ultricies pellentesque ligula nisl sit amet magna.
                           Donec dapibus velit nulla.',
                'img'  => 'https://placehold.it/200x200'
            ],
            [
                'body' => 'Integer fermentum nulla a magna luctus bibendum. Nullam in ex ultricies, tempus orci nec,
                           consectetur purus. Fusce vel urna in purus tincidunt sollicitudin. Donec rutrum nunc ut orci
                           interdum vehicula. Nulla facilisi. Ut ut pellentesque est, et ornare sem. Curabitur tellus arcu,
                           sollicitudin sed elit in, commodo volutpat augue. Aliquam at turpis ipsum. In ac nibh eu mauris
                           gravida condimentum. Nullam vitae augue ut risus maximus aliquam. Duis massa leo, mollis nec urna
                           eget, hendrerit dictum ligula. Vestibulum ac augue nec mi viverra vulputate. Curabitur in metus ut
                           nibh commodo efficitur. Maecenas eget ex dignissim, dictum velit nec, eleifend leo. Sed sit amet
                           vestibulum libero. Nullam aliquet erat nibh, eu fringilla nulla aliquet eget.',
                'img'  => 'https://placehold.it/200x200'
            ]
        ];

        $this->weddingInfoContent = [
            [
                'body' => 'Firefish sardine, shrimpfish spiny dogfish blacktip reef shark; lefteye flounder cisco elephant fish
                           Owens pupfish Black sea bass flathead. Deep sea smelt Cornish Spaktailed Bream tripod fish, gopher
                           rockfish shark sandfish tench flat loach graveldiver hammerhead shark deepwater stingray.',
                'img'  => 'https://placehold.it/200x200'
            ],
            [
                'body' => 'Betta bent-tooth pufferfish hagfish weeverfish eeltail catfish stickleback--steelhead milkfish
                           bullhead; Oregon chub. Electric stargazer wolf-herring red snapper sandburrower broadband dogfish
                           tuna European perch!" Dartfish Death Valley pupfish, Molly Miller; kelp perch buffalofish surgeonfish
                           clownfish sucker scat. Luderick crevice kelpfish bonnetmouth Sacramento splittail European eel common
                           tunny glowlight danio Redhorse sucker bull trout pikeperch menhaden yellowmargin triggerfish. Bluefin
                           tuna prickleback northern anchovy gunnel pelican eel convict blenny blackfish sand knifefish boga grunt
                           sculpin. Wasp fish, glowlight danio temperate perch!',
                'img'  => 'https://placehold.it/200x200'
            ],
            [
                'body' => 'Greeneye, loosejaw scaleless black dragonfish New World rivuline; ghost carp longnose dace anchovy.
                           Muskellunge, peladillo sand goby South American darter.',
                'img'  => 'https://placehold.it/200x200'
            ]
        ];

        $this->lodgingContent = [
            [
                'body' => 'Blue castello roquefort cauliflower cheese. Monterey jack fromage monterey jack melted cheese fromage
                           lancashire cheese and wine dolcelatte. Bocconcini lancashire caerphilly cheesy feet cheesy feet swiss
                           the big cheese caerphilly. Cheesy feet brie.',
                'img'  => 'https://placehold.it/200x200'
            ],
            [
                'body' => 'Halloumi chalk and cheese everyone loves. Cut the cheese cheese and biscuits swiss cheddar fondue
                           gouda cheeseburger cheddar. Red leicester cottage cheese red leicester fromage frais jarlsberg red
                           leicester queso taleggio. Cheesecake dolcelatte fromage stinking bishop boursin cheesecake.',
                'img'  => 'https://placehold.it/200x200'
            ],
            [
                'body' => 'Camembert de normandie hard cheese swiss. Monterey jack stinking bishop cheesecake cheesy grin
                           jarlsberg cheddar say cheese fromage frais. St. agur blue cheese roquefort cottage cheese mascarpone
                           cream cheese cheesy grin hard cheese mozzarella. Cheesy feet hard cheese cheese slices croque monsieur.',
                'img'  => 'https://placehold.it/200x200'
            ]
        ];
    }

    public function index()
    {
        $pageContent = [
            'weddingInfoContent' => $this->weddingInfoContent,
            'ourStoryContent' => $this->ourStoryContent,
            'lodgingInfoContent' => $this->lodgingContent
        ];
        return view('pages.home', $pageContent);
    }

}