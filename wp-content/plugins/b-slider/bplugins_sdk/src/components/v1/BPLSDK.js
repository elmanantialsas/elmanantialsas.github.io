import { useEffect } from "@wordpress/element";
import LicenseHandler from "./../../license/license";
import scramble from "../../utils/scramble";
import useWPOptionQuery from "./../../hooks/useWPOptionQuery";

import data from "./../../../config.json";
const { prefix } = data;

const BPLSDK = ({ setAttributes }) => {
  const { data } = useWPOptionQuery(`${prefix}_pipe`);

  useEffect(() => {
    if (data) {
      const decode = scramble(data, "decode");
      try {
        const info = JSON.parse(decode);
        if (info.time < new Date().getTime() - 60 * 60 * 24 * 2 * 1000) {
          const handler = new LicenseHandler(prefix, [info?.permalink]);
          handler.verifyLicense(info.key);
        }
        setAttributes({ isPremium: info?.activated || false });
      } catch (error) {
        setAttributes({ isPremium: false });
      }
    }
  }, [data]);

  return <span></span>;
};
export default BPLSDK;
