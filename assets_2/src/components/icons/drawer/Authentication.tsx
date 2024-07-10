import { SvgIcon, SvgIconProps } from '@mui/material';

const Authentication = (props: SvgIconProps) => {
  return (
    <SvgIcon width="1em" height="1em" viewBox="0 0 24 24" {...props}>
      <path
        fill="currentColor"
        d="M12 2L4 5v6.09c0 5.05 3.41 9.76 8 10.91c4.59-1.15 8-5.86 8-10.91V5zm6 9.09c0 4-2.55 7.7-6 8.83c-3.45-1.13-6-4.82-6-8.83v-4.7l6-2.25l6 2.25z"
      ></path>
    </SvgIcon>
  );
};

export default Authentication;
