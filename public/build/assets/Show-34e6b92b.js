import{_ as c}from"./AppLayout-099b462c.js";import p from"./DeleteUserForm-df2a50ed.js";import l from"./LogoutOtherBrowserSessionsForm-3da87cfc.js";import{S as s}from"./SectionBorder-0c8e4ee5.js";import f from"./TwoFactorAuthenticationForm-a47c5a62.js";import u from"./UpdatePasswordForm-66372f49.js";import _ from"./UpdateProfileInformationForm-7ad8bf60.js";import{o,c as d,w as n,a as i,e as r,b as t,f as a,F as h}from"./app-4a5491ea.js";import"./_plugin-vue_export-helper-c27b6911.js";import"./DialogModal-62d7862b.js";import"./SectionTitle-0f7bf552.js";import"./DangerButton-fcd99498.js";import"./TextInput-88181f4f.js";import"./SecondaryButton-253f1f09.js";import"./ActionMessage-359b76f0.js";import"./PrimaryButton-278c5088.js";import"./InputLabel-a8d61115.js";import"./FormSection-e5aee119.js";const g=i("h2",{class:"font-semibold text-xl text-gray-800 leading-tight"}," Profile ",-1),$={class:"max-w-7xl mx-auto py-10 sm:px-6 lg:px-8"},w={key:0},k={key:1},y={key:2},z={__name:"Show",props:{confirmsTwoFactorAuthentication:Boolean,sessions:Array},setup(m){return(e,x)=>(o(),d(c,{title:"Profile"},{header:n(()=>[g]),default:n(()=>[i("div",null,[i("div",$,[e.$page.props.jetstream.canUpdateProfileInformation?(o(),r("div",w,[t(_,{user:e.$page.props.auth.user},null,8,["user"]),t(s)])):a("",!0),e.$page.props.jetstream.canUpdatePassword?(o(),r("div",k,[t(u,{class:"mt-10 sm:mt-0"}),t(s)])):a("",!0),e.$page.props.jetstream.canManageTwoFactorAuthentication?(o(),r("div",y,[t(f,{"requires-confirmation":m.confirmsTwoFactorAuthentication,class:"mt-10 sm:mt-0"},null,8,["requires-confirmation"]),t(s)])):a("",!0),t(l,{sessions:m.sessions,class:"mt-10 sm:mt-0"},null,8,["sessions"]),e.$page.props.jetstream.hasAccountDeletionFeatures?(o(),r(h,{key:3},[t(s),t(p,{class:"mt-10 sm:mt-0"})],64)):a("",!0)])])]),_:1}))}};export{z as default};