import{_ as c}from"./AppLayout-5141ffb3.js";import p from"./DeleteUserForm-ef70e127.js";import l from"./LogoutOtherBrowserSessionsForm-fff7640a.js";import{S as s}from"./SectionBorder-61aa86e5.js";import f from"./TwoFactorAuthenticationForm-bb757843.js";import u from"./UpdatePasswordForm-58759589.js";import _ from"./UpdateProfileInformationForm-be0289c0.js";import{o,c as d,w as n,a as i,e as r,b as t,f as a,F as h}from"./app-cddd6561.js";import"./_plugin-vue_export-helper-c27b6911.js";import"./DialogModal-468f6296.js";import"./SectionTitle-ef787703.js";import"./DangerButton-6bfe1584.js";import"./TextInput-fc007e1b.js";import"./SecondaryButton-15ed3e66.js";import"./ActionMessage-3ee596f9.js";import"./PrimaryButton-0c93253e.js";import"./InputLabel-e6339c8c.js";import"./FormSection-f00ddabe.js";const g=i("h2",{class:"font-semibold text-xl text-gray-800 leading-tight"}," Profile ",-1),$={class:"max-w-7xl mx-auto py-10 sm:px-6 lg:px-8"},w={key:0},k={key:1},y={key:2},z={__name:"Show",props:{confirmsTwoFactorAuthentication:Boolean,sessions:Array},setup(m){return(e,x)=>(o(),d(c,{title:"Profile"},{header:n(()=>[g]),default:n(()=>[i("div",null,[i("div",$,[e.$page.props.jetstream.canUpdateProfileInformation?(o(),r("div",w,[t(_,{user:e.$page.props.auth.user},null,8,["user"]),t(s)])):a("",!0),e.$page.props.jetstream.canUpdatePassword?(o(),r("div",k,[t(u,{class:"mt-10 sm:mt-0"}),t(s)])):a("",!0),e.$page.props.jetstream.canManageTwoFactorAuthentication?(o(),r("div",y,[t(f,{"requires-confirmation":m.confirmsTwoFactorAuthentication,class:"mt-10 sm:mt-0"},null,8,["requires-confirmation"]),t(s)])):a("",!0),t(l,{sessions:m.sessions,class:"mt-10 sm:mt-0"},null,8,["sessions"]),e.$page.props.jetstream.hasAccountDeletionFeatures?(o(),r(h,{key:3},[t(s),t(p,{class:"mt-10 sm:mt-0"})],64)):a("",!0)])])]),_:1}))}};export{z as default};